DROP TABLE IF EXISTS 'review';
DROP TABLE IF EXISTS 'course';
DROP TABLE IF EXISTS 'profile';

-- Create the profile entitiy --
CREATE TABLE profile (
	profileId            INT UNSIGNED AUTO_INCREMENT NOT NULL,
	profileEmail         VARCHAR(128)                NOT NULL,
	profilePdgaNumber    VARCHAR(32),
	profileLocation      VARCHAR(128),
	profileThrowingStyle VARCHAR(32),
	UNIQUE(profileEmail),
	PRIMARY KEY(profileId)
);

-- create the course entity --
CREATE TABLE course (
	courseId          INT UNSIGNED AUTO_INCREMENT NOT NULL,
	courseName        VARCHAR(128)                NOT NULL,
	courseLocation    VARCHAR(128)                NOT NULL,
	courseDescription VARCHAR(256)                NOT NULL,
	PRIMARY KEY(courseId)
);

-- create the review entity --
CREATE TABLE review (
	reviewId        INT UNSIGNED AUTO_INCREMENT NOT NULL,
	reviewProfileId INT UNSIGNED                NOT NULL,
	reviewCourseId  INT UNSIGNED                NOT NULL,
	reviewTitle     VARCHAR(128)                NOT NULL,
	reviewRating    VARCHAR(32)                 NOT NULL,
	reviewContent   VARCHAR(256)                NOT NULL,
	reviewDate      DATE                        NOT NULL,
	INDEX(reviewProfileId),
	INDEX(reviewCourseId),
	FOREIGN KEY(reviewProfileId) REFERENCES profile(profileId),
	FOREIGN KEY(reviewCourseId) REFERENCES course(courseId),
	PRIMARY KEY(reviewId)
);
