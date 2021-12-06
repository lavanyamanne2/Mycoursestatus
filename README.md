
Mycourse Status
===============

Mycourse Status is a course completion block for student and editing teacher (from v3.9). You can add the block at site/global and course context level.

Site/Global: display attempted courses.
Course: display attempted modules of a course.
Download report as PDF/MS-Word for student and Pie chart for editing teacher.

How it works
============

(1) Download the plugin and unpack zip file to /blocks directory.

(2) Go to Site administration > Notifications to complete the plugin installation.

(3) Go to Site administration > Advanced features: Enable completion tracking.
(4) The plugin is developed based on three conditions of a course:
        (1) Condition A - module completion
        (2) Condition B - module with course completion
        (3) Condition C - course grade completion
        (Note: Choose either one condition for course completion).
(5) Execution of cron job is required for course completion.        

        (1) Condition A - module completion
            ===============================
    
        A course is completed when user attempt all the modules with conditions. Conditional settings are:

        (a) Add a new module.
        (b) For resource, go to Activity Completion > Completion tracking: Show activity as complete when conditions are met.
                                                    > Require view: Student must view this activity to complete it.
        (c) For activity, go to Activity Completion > Completion tracking: Show activity as complete when conditions are met.
                                                    > Require view: Student must view this activity to complete it.
                                                    > Require grade: Student must receive a grade to complete this activity.
                                                      require minimum score, require status, require passing grade etc.,

        (2) Condition B - module with course completion
            ===========================================

        A course is completed when user attempt all the modules with module + course completion conditions. Conditional settings are:

        (a) Add a new module.
        (b) For resource, go to Activity Completion > Completion tracking: Show activity as complete when conditions are met.
                                                    > Require view: Student must view this activity to complete it.
        (c) For activity, go to Activity Completion > Completion tracking: Show activity as complete when conditions are met.
                                                    > Require view: Student must view this activity to complete it.
                                                    > Require grade: Student must receive a grade to complete this activity.
                                                      require minimum score, require status, require passing grade etc.,
        (d) Course Completion > Completion requirements: Course is complete when ALL Conditions are met.
                              > Condition: Activity completion: you could see modules enabled for activity completion, select the one you wish to or select all.
   
        (3) Condition C - course grade completion  
            =====================================

         A course is completed when user score a final grade without module conditions. The course will calculate the average grade from the attempted modules and match with  
         course criteria grade. Settings are:
   
        (a) Create a course with modules.
        (b) Go to Course settings > Course Completion > Condition: Course grade > input required course grade.
        (c) Note: In case module is deleted when the user has scored a final grade, the block will not update.  
            In that case, backup course, create a new course & add the block.
