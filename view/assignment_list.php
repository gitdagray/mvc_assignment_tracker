<?php include('view/header.php') ?>

<section id="list" class="list">
    <header class="list__row list__header">
        <h1>
            Assignments
        </h1>
        <form action="." method="get" id="list__header_select" class="list__header_select">
            <input type="hidden" name="action" value="list_assignments">
            <select name="course_id" required>
                <option value="0">View All</option>
                <?php foreach ($courses as $course) : ?>
                <?php if ($course_id == $course['courseID']) { ?>
                <option value="<?= $course['courseID'] ?>" selected>
                    <?php } else { ?>
                <option value="<?= $course['courseID'] ?>">
                    <?php } ?>
                    <?= $course['courseName'] ?>
                </option>
                <?php endforeach; ?>
            </select>
            <button class="add-button bold">Go</button>
        </form>
    </header>
    <?php if($assignments) { ?>
    <?php foreach ($assignments as $assignment) : ?>
    <div class="list__row">
        <div class="list__item">
            <p class="bold"><?= "{$assignment['courseName']}" ?></p>
            <p><?= $assignment['Description']; ?></p>
        </div>
        <div class="list__removeItem">
            <form action="." method="post">
                <input type="hidden" name="action" value="delete_assignment">
                <input type="hidden" name="assignment_id" value="<?= $assignment['ID']; ?>">
                <button class="remove-button">❌</button>
            </form>
        </div>
    </div>
    <?php endforeach; ?>
    <?php } else { ?>
    <br>
    <?php if ($course_id) { ?>
    <p>No assignments exist for this course yet.</p>
    <?php } else { ?>
    <p>No assignments exist yet.</p>
    <?php } ?>
    <br>
    <?php } ?>
</section>

<section id="add" class="add">
    <h2>Add Assignment</h2>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_assignment">
        <div class="add__inputs">
            <label>course:</label>
            <select name="course_id" required>
                <option value="">Please select</option>
                <?php foreach ($courses as $course) : ?>
                <option value="<?= $course['courseID']; ?>">
                    <?= $course['courseName']; ?>
                </option>
                <?php endforeach; ?>
            </select>
            <label>Description:</label>
            <input type="text" name="description" maxlength="120" placeholder="Description" required>
        </div>
        <div class="add__addItem">
            <button class="add-button bold">Add</button>
        </div>
    </form>
</section>
<br>
<p><a href=".?action=list_courses">View/Edit Courses</a></p>
<?php include('view/footer.php') ?>