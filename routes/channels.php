<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});





// INSERT INTO `examinations` (`id`, `category_id`, `subcategory_id`, `exam_name`, `slugid`, `marks`, `noQues`, `rightmarks`, `wrongmarks`, `time_duration`, `isFree`, `type`, `created_at`, `updated_at`) VALUES
// (1, 1, 1, 'Test No1', 'b0ca389d44098adc1b8d4d68259c5798', 100.00, 100.00, 1.00, 0.25, 100, 'true', 'not', '2022-08-08 23:46:07', '2022-08-08 23:46:07'),
// (2, 1, 1, 'Test No 2', '42f1ec6fcd28905196253790168d6dcb', 100.00, 100.00, 1.00, 0.25, 100, 'true', 'not', '2022-08-08 23:46:49', '2022-08-08 23:46:49'),
// (3, 1, 1, 'Test No 3', '8ed6d79d45416ad18c1b6706d34394fe', 100.00, 100.00, 1.00, 0.25, 100, 'true', 'not', '2022-08-08 23:47:25', '2022-08-08 23:47:25');


// INSERT INTO `mocktest_examination_languages` (`id`, `examinations_id`, `languages_id`, `created_at`, `updated_at`) VALUES
// (1, 1, 1, NULL, NULL),
// (2, 2, 1, NULL, NULL),
// (3, 3, 1, NULL, NULL);


// INSERT INTO `exam_questions` (`id`, `examination_id`, `question_id`, `slugid`, `created_at`, `updated_at`) VALUES
// (1, 1, 9, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (2, 1, 10, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (3, 1, 11, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (4, 1, 12, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (5, 1, 13, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (6, 1, 14, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (7, 1, 15, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (8, 1, 16, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (9, 1, 17, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (10, 1, 18, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (11, 1, 19, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (12, 1, 20, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (13, 1, 21, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (14, 1, 22, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (15, 1, 23, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (16, 1, 24, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (17, 1, 25, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (18, 1, 26, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (19, 1, 27, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (20, 1, 28, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (21, 1, 29, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (22, 1, 30, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (23, 1, 31, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (24, 1, 32, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (25, 1, 33, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (26, 1, 34, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (27, 1, 35, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (28, 1, 36, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (29, 1, 37, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (30, 1, 38, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (31, 1, 39, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (32, 1, 40, '75d9b307059e392c961380372c15f7dc', NULL, NULL),
// (33, 1, 41, '75d9b307059e392c961380372c15f7dc', NULL, NULL);


