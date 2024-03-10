<?php
//get highest scores in every score
// SELECT `name`, MAX(`score`), `class` FROM students GROUP BY `class`;

//get all data from directors with its count movies
//SELECT *, COUNT(movies.id) FROM directors LEFT JOIN movies ON movies.directorId = directors.id GROUP BY directors.name;
