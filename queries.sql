Given tables:

01. tasks (id, name, status, project_id)
02. projects (id, name)
Technical requirements

- get all statuses, not repeating, alphabetically ordered

SELECT DISTINCT status
FROM tasks
ORDERED BY status ASC


- get the count of all tasks in each project, order by tasks count
descending

SELECT projects.id, projects.title, COUNT(tasks.id) as tasks_count
FROM `projects`
INNER JOIN tasks ON tasks.project_id = projects.id
GROUP BY tasks.project_id
ORDER BY tasks_count DESC

- get the count of all tasks in each project, order by projects
names

SELECT projects.id, projects.title, COUNT(tasks.id) as tasks_count
FROM `projects`
INNER JOIN tasks ON tasks.project_id = projects.id
GROUP BY tasks.project_id
ORDER BY projects.title ASC

- get the tasks for all projects having the name beginning with
"N" letter

SELECT tasks.*
FROM `projects`
INNER JOIN tasks ON tasks.project_id = projects.id
WHERE projects.title LIKE "N%"


- get the list of all projects containing the 'a' letter in the middle of
the name, and show the tasks count near each project. Mention
that there can exist projects without tasks and tasks with
project_id = NULL

SELECT projects.*, COUNT(tasks.id) as count_tasks
FROM projects
LEFT JOIN tasks ON projects.id = tasks.project_id
WHERE projects.title LIKE "%a%"
GROUP BY tasks.project_id

UNION

SELECT projects.*, COUNT(tasks.id) as count_tasks
FROM projects
RIGHT JOIN tasks ON projects.id = tasks.project_id
WHERE projects.title LIKE "%a%"
GROUP BY tasks.project_id


- get the list of tasks with duplicate names. Order alphabetically

SELECT t1.*
FROM tasks t1
JOIN (SELECT title
FROM tasks 
GROUP BY title
HAVING count(*) > 1 ) t2
ON t1.title = t2.title
ORDER BY t1.title ASC


- get list of tasks having several exact matches of both name and
status, from the project 'Garage'. Order by matches count

получить список задач имеющих точное совпадение по имени и статусу из проекта Garage.
отсортировать по колличеству совпадений

SELECT 
    tasks.title, COUNT(tasks.title) as count_title,
    tasks.status,  COUNT(tasks.status) as count_status
FROM
    projects
INNER JOIN tasks ON projects.id = tasks.project_id
WHERE projects.title = 'Garage'
GROUP BY 
    tasks.title, 
    tasks.status
HAVING  COUNT(tasks.title) > 1
    AND COUNT(tasks.status) > 1

ORDER BY count_title, count_status;


- get the list of project names having more than 10 tasks in status
'completed'. Order by project_id


SELECT projects.title
FROM projects
INNER JOIN tasks ON projects.id = tasks.project_id
WHERE tasks.status = 1
GROUP BY projects.title
HAVING COUNT(tasks.id) > 10;
