<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Teacher\Exam;
use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;
use App\Models\Teacher\Classroom;
use OpenAI\Laravel\Facades\OpenAI;
use App\Http\Controllers\Controller;
use App\DataTables\Teacher\ExamDataTable;
use App\Http\Requests\Teacher\ExamRequest;
use App\Models\Teacher\ExamQuestion;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ExamDataTable $dataTable)
    {
        $data['recordsTotal'] = $dataTable->recordsTotal + 1;
        return $dataTable->render('teacher.exams.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $data['classrooms'] = Classroom::where('instructor_id', $user_id)->orderBy('name')->get();
        $data['exam']       = new Exam();
        return view('teacher.exams.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExamRequest $request)
    {
        if($request->has('document_file')) {
            $file       = $request->file('document_file');
            $parser     = new Parser();
            $pdf        = $parser->parseFile($file);
            $content    = $pdf->getText();
        }

        $exam = new Exam();
        $exam->classroom_id             = $request['classroom_id'];
        $exam->name                     = $request['name'];
        $exam->items                    = $request['items'];
        $exam->content                  = $content;
        $exam->passing_grade            = $request['passing_grade'];
        $exam->display_student_score    = $request['display_student_score'];
        $exam->status                   = $request['status'];
        $exam->published_at             = $request['published_at'];
        $exam->save();

        return redirect()->to('teacher/exams/' . $exam->id . '/edit')->with('success', 'The examination has been uploaded.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $exam       = Exam::find($id);
        $content    = 'Write ' . $exam->items . ' questions with 4 multiple choice of a,b,c and d, and answer using this topic. ' . $exam->content;

        $result     = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $content],
            ],
        ]);

        $text               = $result->choices[0]->message->content;
        $questions          = [];
        $current_question   = [];

        $lines = explode("\n", $text);

        foreach ($lines as $line) {
            if (preg_match('/^\d+\./', $line)) {
                if (!empty($current_question)) {
                    $questions[] = $current_question;
                }
                $current_question = ['question' => trim($line), 'options' => [], 'answer' => ''];
            } elseif (preg_match('/^[a-d]\) .+/', $line)) {
                $current_question['options'][] = trim($line);
            } elseif (preg_match('/^Answer:/', $line)) {
                $current_question['answer'] = trim(str_replace('Answer: ', '', $line));
            }
        }

        if (!empty($current_question)) {
            $questions[] = $current_question;
        }

        return $questions;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user_id                = auth()->user()->id;
        $data['exam']           = $exam = Exam::find($id);
        $data['classrooms']     = Classroom::where('instructor_id', $user_id)->orderBy('name')->get();
        $data['classroom_ids']  = explode(',', $exam->classroom_ids);
        $data['questions']      = ExamQuestion::where('exam_id', $exam->id)->get();
        
        return view('teacher.exams.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $content        = $request['content'];
        if($request->has('document_file')) {
            $file       = $request->file('document_file');
            $parser     = new Parser();
            $pdf        = $parser->parseFile($file);
            $content    = $pdf->getText();
        }

        $exam = Exam::find($id);
        $exam->classroom_id             = $request['classroom_id'];
        $exam->name                     = $request['name'];
        $exam->items                    = $request['items'];
        $exam->content                  = $content ?? $exam->content;
        $exam->passing_grade            = $request['passing_grade'];
        $exam->display_student_score    = $request['display_student_score'];
        $exam->status                   = $request['status'];
        $exam->published_at             = $request['published_at'];
        $exam->save();

        if(isset($request['generate']) && isset($exam->content)) {
            $this->generateQuestions($exam);
        }

        if(isset($request['clean']) && isset($exam->content)) {
            ExamQuestion::where('exam_id', $exam->id)->delete();
            $this->generateQuestions($exam);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exam = Exam::find($id);
        $exam->delete();

        return response()->json(200);
    }

    private function generateQuestions($exam)
    {
        $content    = 'Write ' . $exam->items . ' questions with 4 multiple choice of a,b,c and d, and answer using this topic. ' . $exam->content;
        $result     = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $content],
            ],
        ]);

        $text               = $result->choices[0]->message->content;
        $questions          = [];
        $current_question   = [];

        $lines = explode("\n", $text);

        foreach ($lines as $line) {
            if (preg_match('/^\d+\./', $line)) {
                if (!empty($current_question)) {
                    $questions[] = $current_question;
                }
                $current_question = ['question' => trim($line), 'options' => [], 'answer' => ''];
            } elseif (preg_match('/^[a-d]\) .+/', $line)) {
                $current_question['options'][] = trim($line);
            } elseif (preg_match('/^Answer:/', $line)) {
                $current_question['answer'] = trim(str_replace('Answer: ', '', $line));
            }
        }

        if (!empty($current_question)) {
            $questions[] = $current_question;
        }

        foreach ($questions as $item) {
            $questionaire = new ExamQuestion();
            $questionaire->exam_id  = $exam->id;
            $questionaire->question = $item['question'];
            $questionaire->options  = implode(',', $item['options']);
            $questionaire->answer   = $item['answer'];
            $questionaire->save();
        }
    }
}
