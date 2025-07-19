# Bug Tracker Project

A mini bug-tracking app built using vanilla HTML, CSS, JavaScript, PHP, and JSON.

---

## 🚀 Features

-  Submit new bug reports (title, description, reporter, priority)
-  Duplicate bug detection
-  Admin dashboard to view and update bugs
-  Dynamic filtering by status and priority
-  Data stored in a JSON file (no database required)

---

## 🛠️ How to Run Locally

1.  Install PHP (if not already)
2.  Clone or download this repo
3.  Run the PHP server in the project root:

## Duplicate bug detection explanation
when a user submit a new bug submit.php call isDuplicate function and it take two arguements. two arguments are new bug and array of all existing bugs loop through every bug skip bug status equal to resolved. so rest other bugs get to similar_text function and compare title and description with existing bug and new one. if average similaraty is more than 80% then considered as duplicate and return true. if none of bugs in the existing list not match to new one return false (not a duplicate)

