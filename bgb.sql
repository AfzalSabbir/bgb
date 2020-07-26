/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : bgb

 Target Server Type    : MySQL
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 12/03/2019 13:58:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_access_infos
-- ----------------------------
DROP TABLE IF EXISTS `admin_access_infos`;
CREATE TABLE `admin_access_infos`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `device` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `browser` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` tinyint(2) NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `admin_access_infos_admin_id_foreign`(`admin_id`) USING BTREE,
  CONSTRAINT `admin_access_infos_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admin_access_infos
-- ----------------------------
INSERT INTO `admin_access_infos` VALUES (5, 1, '127.0.0.1', 'US', 'PC', 'Chrome', 1, '2019-03-06 10:07:21', '2019-03-06 10:07:21');
INSERT INTO `admin_access_infos` VALUES (7, 1, '::1', 'US', 'PC', 'Chrome', 1, '2019-03-06 10:44:14', '2019-03-06 10:44:14');
INSERT INTO `admin_access_infos` VALUES (8, 1, '::1', 'US', 'PC', 'Chrome', 1, '2019-03-07 05:23:56', '2019-03-07 05:23:56');
INSERT INTO `admin_access_infos` VALUES (9, 1, '::1', 'US', 'PC', 'Chrome', 1, '2019-03-07 14:34:21', '2019-03-07 14:34:21');
INSERT INTO `admin_access_infos` VALUES (10, 1, '::1', 'US', 'PC', 'Chrome', 1, '2019-03-07 15:58:18', '2019-03-07 15:58:18');
INSERT INTO `admin_access_infos` VALUES (11, 1, '::1', 'US', 'PC', 'Chrome', 1, '2019-03-07 16:01:21', '2019-03-07 16:01:21');
INSERT INTO `admin_access_infos` VALUES (12, 1, '::1', 'US', 'PC', 'Chrome', 1, '2019-03-08 09:50:18', '2019-03-08 09:50:18');
INSERT INTO `admin_access_infos` VALUES (13, 1, '::1', 'US', 'PC', 'Chrome', 1, '2019-03-08 15:09:04', '2019-03-08 15:09:04');
INSERT INTO `admin_access_infos` VALUES (14, 1, '::1', 'US', 'PC', 'Chrome', 1, '2019-03-08 16:22:12', '2019-03-08 16:22:12');
INSERT INTO `admin_access_infos` VALUES (15, 1, '::1', 'US', 'PC', 'Chrome', 1, '2019-03-08 16:22:23', '2019-03-08 16:22:23');
INSERT INTO `admin_access_infos` VALUES (16, 1, '::1', 'US', 'PC', 'Chrome', 1, '2019-03-08 16:23:05', '2019-03-08 16:23:05');
INSERT INTO `admin_access_infos` VALUES (17, 1, '::1', 'US', 'PC', 'Chrome', 1, '2019-03-09 03:45:21', '2019-03-09 03:45:21');
INSERT INTO `admin_access_infos` VALUES (18, 1, '18', 'US', 'PC', 'Chrome', 1, '2019-03-09 11:03:45', '2019-03-09 11:03:45');
INSERT INTO `admin_access_infos` VALUES (19, 1, '::1', 'US', 'PC', 'Chrome', 1, '2019-03-09 11:48:06', '2019-03-09 11:48:06');
INSERT INTO `admin_access_infos` VALUES (20, 1, '::1', 'US', 'PC', 'Chrome', 1, '2019-03-09 11:53:59', '2019-03-09 11:53:59');
INSERT INTO `admin_access_infos` VALUES (21, 1, '::1', 'US', 'PC', 'Chrome', 1, '2019-03-10 03:39:56', '2019-03-10 03:39:56');
INSERT INTO `admin_access_infos` VALUES (22, 1, '::1', 'US', 'PC', 'Chrome', 1, '2019-03-10 07:45:59', '2019-03-10 07:45:59');
INSERT INTO `admin_access_infos` VALUES (23, 1, '::1', 'US', 'PC', 'Chrome', 1, '2019-03-10 09:29:27', '2019-03-10 09:29:27');
INSERT INTO `admin_access_infos` VALUES (24, 1, '::1', 'US', 'PC', 'Chrome', 1, '2019-03-11 09:42:00', '2019-03-11 09:42:00');
INSERT INTO `admin_access_infos` VALUES (25, 1, '::1', 'US', 'PC', 'Chrome', 1, '2019-03-12 07:46:06', '2019-03-12 07:46:06');

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_role` tinyint(3) NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NULL DEFAULT 1,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admins_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES (1, 'Admin', 'super@gmail.com', 'admin', 1, '$2y$10$tQVwD5VequDrZsgg5NUaHexmp3fGf.XI7zylpDEqSxf9WJITYiRWO', 1, 'YGCgVniQ0NVm1T81SNhkb7vyYXj1p51y9xSLBRufWgzEPr1UhD2lm2xs8hPU', NULL, '2019-03-07 16:01:34');
INSERT INTO `admins` VALUES (2, 'Admin2', 'super2@gmail.com', 'admin2', 2, '$2y$10$RFpXMyxvYJzl1OoltPp3MOixav2OMRWGq4XDDL7fx0v9E6jdQWdVi', 1, 'HhprKshriPsDobItDh0EPctzruqXk6uuHvRT9VA7yumNBY0B6oSZpQCQE2pE', NULL, '2018-12-06 17:36:02');

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_bn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `menu_position` int(10) UNSIGNED NOT NULL COMMENT '0 - Left | 1 - Top | 2 - Dropdown',
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `order` int(11) NULL DEFAULT NULL,
  `route` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (6, 'Role', 'মেনু ভূমিকা', NULL, 0, 'fa fa-dashboard', '/role', 200, 'admin.role.index', 1, '2019-03-05 07:50:49', '2019-03-08 10:36:56');
INSERT INTO `menus` VALUES (8, 'Access Information', 'প্রবেশাধিকার তথ্য', NULL, 0, 'fa fa-cog', '/access-info', 201, 'admin.access.index', 1, '2019-03-06 11:18:12', '2019-03-08 10:36:23');
INSERT INTO `menus` VALUES (17, 'Change Password', 'পাসওয়ার্ড পরিবর্তন', NULL, 0, 'fa fa-cog', '/change-password', 199, 'admin.password.form', 1, '2019-03-07 15:47:35', '2019-03-08 16:09:02');
INSERT INTO `menus` VALUES (23, 'Student', 'শিক্ষার্থী', NULL, 0, 'fa fa-user', NULL, 30, NULL, 1, '2019-03-10 09:42:53', '2019-03-10 09:42:53');
INSERT INTO `menus` VALUES (24, 'Add Student', 'শিক্ষার্থী সংযোজন', 23, 0, 'fa fa-plus', 'admin/student/add', 34, 'admin.student.create', 1, '2019-03-10 09:45:34', '2019-03-10 09:45:34');
INSERT INTO `menus` VALUES (25, 'All Student', 'সকল শিক্ষার্থী', 23, 0, 'fa fa-user', 'admin/student', 35, 'admin.student.index', 1, '2019-03-10 09:48:12', '2019-03-10 09:48:12');
INSERT INTO `menus` VALUES (26, 'Teacher', 'শিক্ষক', NULL, 0, 'fa fa-male', NULL, 29, NULL, 1, '2019-03-12 07:47:03', '2019-03-12 07:47:03');
INSERT INTO `menus` VALUES (27, 'All Teacher', 'সকল শিক্ষক', 26, 0, 'fa fa-angle-right', '/admin/teacher', 2, 'admin.teacher.index', 1, '2019-03-12 07:48:05', '2019-03-12 07:48:05');
INSERT INTO `menus` VALUES (28, 'Add Teacher', 'শিক্ষক সংযোজোন', 26, 0, 'fa fa-plus', '/admin/teacher/add', 1, 'admin.teacher.create', 1, '2019-03-12 07:49:40', '2019-03-12 07:49:40');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (2, '2018_12_06_050413_create_users_table', 1);
INSERT INTO `migrations` VALUES (3, '2018_12_06_053543_create_admins_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_03_04_084037_create_menus_table', 2);
INSERT INTO `migrations` VALUES (5, '2019_03_05_074453_create_roles_table', 3);
INSERT INTO `migrations` VALUES (6, '2019_03_06_090310_create_admin_access_infos_table', 4);
INSERT INTO `migrations` VALUES (7, '2019_03_11_094735_create_students_table', 5);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_menu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(3) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, '[\"26\",\"23\",\"17\",\"6\",\"8\"]', '[\"28\",\"27\",\"24\",\"25\"]', 1, 1, '2019-03-05 08:26:42', '2019-03-12 07:49:50');

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll` int(10) UNSIGNED NOT NULL,
  `registration` int(10) UNSIGNED NOT NULL,
  `father_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `mother_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `student_mobile` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `guardian_mobile` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `dob` date NULL DEFAULT NULL,
  `religion` tinyint(3) UNSIGNED NOT NULL COMMENT '1-Islam | 2-Hindu | 3-Christian | 4-Buddhist | 5-Other',
  `gender` tinyint(3) UNSIGNED NOT NULL COMMENT '1-Male | 2-Female | 3-Other',
  `blood_group` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `present_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `permanent_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `class` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `section` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `group` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `year` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `shift` tinyint(3) UNSIGNED NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `fourth_subject` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `students_registration_id_unique`(`registration`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` tinyint(4) NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NULL DEFAULT 1,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Demo User', 'demouser@gmail.com', 1, '$2y$10$RFpXMyxvYJzl1OoltPp3MOixav2OMRWGq4XDDL7fx0v9E6jdQWdVi', 1, 'W4ycuN27Wfr29MMUuEgd0COwKLBjSXWn1jOZilEsrv00wuP7BBAR5CXlC4iy', '2019-02-21 16:55:14', '2019-02-28 03:40:06');

SET FOREIGN_KEY_CHECKS = 1;
