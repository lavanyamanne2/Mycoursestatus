Mycoursestatus
==============

Mycoursestatus is a course completion report block, developed for student and editing teacher (from v3.9). You can add the block plugin at site/global and course context level.

Site/Global: display attempted courses.
Course: display attempted modules of a course.
Downloadable report as PDF/MS-Word for student and Pie chart for editing teacher.

How it works
============

(1) Download the plugin and unpack zip file to /blocks directory.

(2) Go to Site administration > Notifications to complete the plugin installation.

(3) Go to Site administration > Advanced features: Enable completion tracking.

(4) The plugin is developed based on three conditions of a course:
      (1) Condition A - module completion
      (2) Condition B - module with course completion
      (3) Condition C - course grade completion
      (Note: Pick condition A/condition B/condition C. Do not pick more than one condition for a 
      course).


    (1) Condition A - module completion
    ===================================

    A course is completed when all modules satisfy the conditions, where conditional settings are 
    mandatory for each module as:
          
    (a) Add a new module.
    (b) For resource, go to Activity Completion > Completion tracking: Show activity as complete when conditions are met,
                                                > Require view: Student must view this activity to complete it.
    (c) For activity, go to Activity Completion > Completion tracking: Show activity as complete when conditions are met,
                                                > Require view: Student must view this activity to complete it.
                                                > Require grade: Student must receive a grade to complete this activity,
                                                  require minimum score, require status, require passing grade etc.,

    (2) Condition B - module with course completion
    ===============================================

    A course is completed when all modules satisfy the conditions along with course completion 
    conditions, where conditional settings are mandatory for each module and on course completion   
    page as:
    
    (a) Add a new module.
    (b) For resource, go to Activity Completion > Completion tracking: Show activity as complete when conditions are met,
                                                > Require view: Student must view this activity to complete it.
    (c) For activity, go to Activity Completion > Completion tracking: Show activity as complete when conditions are met,
                                                > Require view: Student must view this activity to complete it.
                                                > Require grade: Student must receive a grade to complete this activity,
                                                  require minimum score, require status, require passing grade etc.,
    (d) Course Completion > Completion requirements: Course is complete when ALL Conditions are met.
                          > Condition: Activity completion: you could see modules enabled for activity completion, select
 						    the one you wish to or select all.
   
    (3) Condition C - course grade completion  
     ========================================

    A course is completed when minimum course grade is scored without conditional settings. Just do   
    create modules with content and do not set any condition to module. The course will calculate 
    the average grade from attempted modules and match with course criteria grade as:
   
    (a) Create a course with modules.
    (b) go to Course settings > Course Completion > Condition: Course grade > input required course 
        grade.
    (c) Note: When a module is removed after student received course grade, there will not be any 
        update in the block. In that case, backup course, create a new course & add the block.
