Mycoursestatus
==============

Mycoursestatus is a course completion report block, developed for student and editing teacher (from v3.9). You can add the block
plugin at site/global and course context level.

site/global: shows attempted courses.
course: shows attempted modules of a course. 
Report can be downloaded as PDF/MS-Word for student and Pie chart for editing teacher.

How it works
============

(1) Download the plugin and unpack zip file to /blocks directory. 

(2) Go to Site administration > Notifications to complete the plugin installation.

(3) Go to Site administration > Advanced features: Enable completion tracking.

(4) This plugin is developed based on three conditions:
    (1) Condition A - module completion
    (2) Condition B - module with course completion
    (3) Condition C - course grade completion   
    (Note: Choose condition A/condition B/condition C, do not choose more than one condition for a course).

    (1) Condition A - module completion
    ===================================

    Modules enabled for activity completion. Setting has to be done for each module.
          
    (a) Add a new module.
    (b) For resource, go to Activity Completion > Completion tracking: Show activity as complete when conditions are met,
                                                > Require view: Student must view this activity to complete it.
    (c) For activity, go to Activity Completion > Completion tracking: Show activity as complete when conditions are met,
                                                > Require view: Student must view this activity to complete it,
                                                > Require grade: Student must receive a grade to complete this activity,
                                                  require minimum score, require status, require passing grade etc.,

    (2) Condition B - module with course completion
    ===============================================

    Modules enabled for activity completion with course completion. Setting has to be done for each module and course
    completion page.
    
    (a) Add a new module.
    (b) For resource, go to Activity Completion > Completion tracking: Show activity as complete when conditions are met,
                                                > Require view: Student must view this activity to complete it.
    (c) For activity, go to Activity Completion > Completion tracking: Show activity as complete when conditions are met,
                                                > Require view: Student must view this activity to complete it,
                                                > Require grade: Student must receive a grade to complete this activity,
                                                  require minimum score, require status, require passing grade etc.,
    (d) Course Completion > Completion requirements: Course is complete when ALL Conditions are met.
                          > Condition: Activity completion: you could see modules enabled for activity completion, select
 						    the one you wish to or select all.
   
    (3) Condition C - course grade completion  
     ========================================

     A minimum course grade is required to complete a course; no matter all modules were completed. Setting has to be done from
     course completion page.

     (a) Create a course with modules.
     (b) go to Course settings > Course Completion > Condition: Course grade > input required course grade. Course grade calculate
         by taking average of attempted modules.
     (c) Note: When a module is removed after student received course grade, there will not be any update in the block.
         In that case, backup course, create a new course & add the block.
