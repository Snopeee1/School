<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use MattDaneshvar\Survey\Models\Survey;
use Illuminate\Support\Facades\DB;


class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $survey = Survey::create(['name' => 'Course Recommendation Survey', 'settings' => ['limit-per-participant' => 1]]);

      //MANUAL QUESTIONS


      //STEM 1-3

      $survey->questions()->create([
        'content' => 'When confronted with an issue, I enjoy examining facts and coming up with logical solutions',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      $survey->questions()->create([
        'content' => 'On a scale of 1-5,How satisfied are you with the amount of hands-on experience you acquired in this course?',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      $survey->questions()->create([
        'content' => 'On a scale of 1-5, in how many ways did you feel challenged in this course?',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      //HUMSS 4-6

      $survey->questions()->create([
        'content' => 'I am deeply interested in human behavior, society, and culture',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      $survey->questions()->create([
        'content' => 'On a scale of 1-5,How important do you believe critical thinking abilities should be taught in schools?',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      $survey->questions()->create([
        'content' => 'On a scale of 1-5,How much fun do you have debating and discussing contentious issues?',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      //CA 7-9

      $survey->questions()->create([
        'content' => 'I have a passion for food, enjoy experimenting with different flavors and ingredients, and have a keen interest in the culinary arts',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      $survey->questions()->create([
        'content' => 'On a scale of 1-5,How confident are you in your ability to make a tasty and balanced sauce from scratch?',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      $survey->questions()->create([
        'content' => 'On a scale of 1-5,How much fun do you have in the kitchen experimenting with different flavor combinations and ingredients?',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      //OM 10-12

      $survey->questions()->create([
        'content' => 'I am detail-oriented and possess strong organizational skills, which aligns with the requirements of courses related to operations management',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      $survey->questions()->create([
        'content' => 'I am detail-oriented and possess strong organizational skills, which aligns with the requirements of courses related to operations management',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      $survey->questions()->create([
        'content' => 'I am detail-oriented and possess strong organizational skills, which aligns with the requirements of courses related to operations management',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      //GAS 13-15

      $survey->questions()->create([
        'content' => 'I have a curious mind and enjoy learning about new things and fields',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      $survey->questions()->create([
        'content' => 'On a scale of 1-5,How well do you believe you understand the scientific method and its use in research?',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      $survey->questions()->create([
        'content' => 'On a scale if 1-5,How much do you appreciate working together with your classmates?',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      //ABM 16-18

      $survey->questions()->create([
        'content' => 'On a scale of 1 to 5, how do you believe this course (ABM) will boost a companys sales?',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      $survey->questions()->create([
        'content' => 'On a scale of 1-5, how likely are you to suggest ABM to other businesses as a marketing technique?',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      $survey->questions()->create([
        'content' => 'I consider myself a natural leader and am interested in learning about business and management.',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      //CE 19-21

      $survey->questions()->create([
        'content' => 'I have excellent spatial awareness and enjoy working with architectural ideas.',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      $survey->questions()->create([
        'content' => '-On a scale of 1-5,How confident are you in your ability to create and deploy a complex software system?',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      $survey->questions()->create([
        'content' => 'On a scale of 1-5,How effectively do you believe the course is preparing you for a career in computer engineering?',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      //IT 22-24

      $survey->questions()->create([
        'content' => 'On a scale of 1-5, how interested are you in a career in programming?',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      $survey->questions()->create([
        'content' => 'On a scale of 1-5, how well do you believe this course will prepare you for a career in the technology business?',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      $survey->questions()->create([
        'content' => 'I have a natural talent for working with technology and enjoy solving problems in the digital arena.',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      //HRM 25-27

      $survey->questions()->create([
        'content' => 'I have excellent communication and interpersonal skills and enjoy working in the hospitality industry.',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      $survey->questions()->create([
        'content' => 'On a scale of 1-5,How well do you believe your organization promotes diversity and inclusion in the workplace?',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      $survey->questions()->create([
        'content' => 'On a scale of 1-5,How much do you believe your firm appreciates and promotes work-life balance?',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      //EIM 28-30

      $survey->questions()->create([
        'content' => 'I am a creative and innovative person who enjoys exploring new ideas and chances.',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      $survey->questions()->create([
        'content' => 'On a scale of 1-5,How important do you believe data security and privacy should be in EIM? ',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      $survey->questions()->create([
        'content' => 'On a scale of 1-5,How confident are you in your abilities to build and implement a successful EIM strategy?',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      //PN 31-33

      $survey->questions()->create([
        'content' => 'I am compassionate and enjoy helping others, making courses related to practical nursing a field of interest to me ',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      $survey->questions()->create([
        'content' => 'On a scale of 1-5, how confident are you in performing core nursing skills such as vital sign taking and medication administration?',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);

      $survey->questions()->create([
        'content' => 'On a scale of 1-5, how prepared do you believe you are for your clinical rotations?',
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);


    }
}
