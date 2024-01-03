<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run()
     {
         DB::table('courses')->insert([
             'code' => 'ABM',
             'name' => 'Accoutancy, Business, and Managment',
             'description' => 'This course focuses on the foundational concepts of corporate operations, financial management, and business management. You will be trained to analyze assets, understand financial positions, interpret various profitability, and prepare audit accounts.',
             'created_at' => now(),
             'updated_at' => now()
         ]);

         DB::table('courses')->insert([
             'code' => 'EIM',
             'name' => 'Electrical Installation and Maintenance',
             'description' => 'This course focuses on the study of theoretical and practical knowledge of computer hardware necessary for troubleshooting hardware, software, and network system problems.',
             'created_at' => now(),
             'updated_at' => now()
         ]);

         DB::table('courses')->insert([
             'code' => 'CA',
             'name' => 'Culinary Arts',
             'description' => 'This course equips students with the practical skills needed for post-secondary education or a career in the food service industry. While mastering culinary techniques, students also learn entrepreneurial concepts, hands-on kitchen experience, and participate in work-based learning experiences.',
             'created_at' => now(),
             'updated_at' => now()
         ]);

         DB::table('courses')->insert([
             'code' => 'IT',
             'name' => 'Information Technology',
             'description' => 'This course focuses on the study, design, development, implementation, support or management of computer-based information systems. IT workers help ensure that computers work well for people. Students are exposed to scenarios on project management, web design, and customer service scenarios.',
             'created_at' => now(),
             'updated_at' => now()
         ]);

         DB::table('courses')->insert([
             'code' => 'HUMSS',
             'name' => 'Humanities and Social Sciences',
             'description' => 'This strand focuses on the study of societal issues that provides a deeper understanding on the interplay of the different aspects of society. It aims to improve student’s reading, writing, and communication skills.',
             'created_at' => now(),
             'updated_at' => now()
         ]);

         DB::table('courses')->insert([
             'code' => 'STEM',
             'name' => 'Science, Technology, Engineering, and Mathematics',
             'description' => 'This course prepares students for college and graduate studies in the fields of science, technology, engineering, and mathematics. In addition to subject-specific learning, this course aims to foster inquiring minds, logical reasoning, and collaboration skills.',
             'created_at' => now(),
             'updated_at' => now()
         ]);

         DB::table('courses')->insert([
             'code' => 'GAS',
             'name' => 'General Academic Strand',
             'description' => 'This course takes on a generalist approach in preparing students for college. Since GAS does not specialize in any strand, you are free to choose any college degree program under the three other strands based on your electives.',
             'created_at' => now(),
             'updated_at' => now()
         ]);

         DB::table('courses')->insert([
             'code' => 'CE',
             'name' => 'Computer Engineering',
             'description' => 'This course focuses on the study of theoretical and practical knowledge of computer hardware necessary for troubleshooting hardware, software, and network system problems.',
             'created_at' => now(),
             'updated_at' => now()
         ]);

         DB::table('courses')->insert([
             'code' => 'HRM',
             'name' => 'Hotel and Restaurant Management',
             'description' => 'This course is designed to arm students with knowledge and skills on the proper handling and care of hotel, restaurant, and bar equipment, as well as customers and hotel guests.',
             'created_at' => now(),
             'updated_at' => now()
         ]);

         DB::table('courses')->insert([
             'code' => 'PN',
             'name' => 'Practical Nursing',
             'description' => 'The course equips trainees with the knowledge, skills and attitudes in nursing in accordance with industry standards. Students learn how to provide care, foster development, and maintain healthy environments. Students are prepared for employment in private and large group physicians, offices, clinics, hospitals, long-term care facilities, and other healthcare areas.',
             'created_at' => now(),
             'updated_at' => now()
         ]);

         DB::table('courses')->insert([
             'code' => 'OM',
             'name' => 'Office Management',
             'description' => 'This course trains students on the design, implementation, evaluation, and maintenance of the process of work within an office or other organization. Students learn proper planning and control of activities, reduction of office costs, and coordination of all activities of business.',
             'created_at' => now(),
             'updated_at' => now()
         ]);
     }
}
