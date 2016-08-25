select

ce_activities_assessments.activity_id,
ce_assessments_students.student_id,
ce_reg_students.first_name,
ce_reg_students.last_name,
ce_assessments_questions.question,
ce_assessments_responses.response_txt,
ce_assessments_answers.answer 

from ce_assessments_responses

left join ce_assessments_students
  on ce_assessments_students.id = ce_assessments_responses.assessment_student_id

left join ce_activities_assessments
  on ce_activities_assessments.assessment_id = ce_assessments_students.assessment_id
  and ce_activities_assessments.activity_id = ce_assessments_students.`activity_id`

left join ce_assessments_questions
  on ce_assessments_responses.question_id = ce_assessments_questions.id

left join ce_assessments_answers
  on ce_assessments_answers.`id` = ce_assessments_responses.response_id

left join ce_reg_students
  on ce_reg_students.id = ce_assessments_students.`student_id`
  
where ce_activities_assessments.activity_id = 11240
  and ce_assessments_responses.assessment_id = 10
  and ce_assessments_questions.question is not null;

[2:17]  
id=10 is C2C 11 is follow-up 1 and 12 is follow-up 2