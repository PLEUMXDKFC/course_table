CREATE TABLE `tb_plan` (
  `plan_id` int NOT NULL,
  `teacher_id` int,
  `term` enum('1', '2', '3', '4', '5', '6') NOT NULL,
  `year` int(4) NOT NULL,
  `level` enum('ปวช.', 'ปวส.', 'ปวส. ม.6') NOT NULL,
  `group` enum('1-2','3') NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `type` enum('ทฤษฎี','ปฏิบัติ') NOT NULL,
  `theory` tinyint DEFAULT 0,
  `practice` tinyint DEFAULT 0,
  `credits` tinyint DEFAULT 0,
  `category` enum('หมวดวิชาสมรรถนะแกนกลาง', 'หมวดวิชาสมรรถนะวิชาชีพ', 'หมวดวิชาเลือกเสรี', 'กิจกรรมเสริมหลักสูตร', 'รายวิชาปรับพื้นฐาน') NOT NULL,
  `plan_group` enum('กลุ่มสมรรถนะภาษาและการสื่อสาร', 'กลุ่มสมรรถนะการคิดและการแก้ปัญหา', 'กลุ่มสมรรถนะทางสังคมและการดำรงชีวิต', 'กลุ่มสมรรถนะวิชาชีพพื้นฐาน', 'กลุ่มสมรรถนะวิชาชีพเฉพาะ', 'กลุ่มวิชาสำหรับผู้จบ ปวช.ต่างประเภทวิชา') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `tb_plan`
  ADD PRIMARY KEY (`plan_id`);

ALTER TABLE `tb_plan`
  MODIFY `plan_id` int NOT NULL AUTO_INCREMENT;

CREATE TABLE `teacherinfo` (
  `teacher_id` int NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `teacherinfo`
  MODIFY `teacher_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY;

ALTER TABLE `tb_plan`
  ADD CONSTRAINT `fk_teacher`
  FOREIGN KEY (`teacher_id`) REFERENCES `teacherinfo`(`teacher_id`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

INSERT INTO teacherinfo (teacher_name, qualification, role)
  VALUES ('ครูตัวอย่าง', 'ปริญญาตรี', 'อาจารย์');

ALTER TABLE `teahcerinfor`
  ADD (`prefix`);