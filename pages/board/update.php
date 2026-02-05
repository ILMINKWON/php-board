<?php
    $row = $db->query("SELECT * FROM board WHERE idx = '{$_GET['idx']}'")->fetch(PDO::FETCH_OBJ);
?>
<form action="./?page=action" method="post">
    <fieldset>
        <legend>글작성</legend>
        <ul>
            <li>
                <label>
                    제목
                    <input type="text" name="subject" value="<?php echo $row->subject?>"/>
                    <input type="hidden" name="idx" value="<?= $row->idx ?>">
                    <input type="hidden" name="action" value="update">
                </label>
            </li>
            <li>
                <label>
                    작성자
                    <input type="text" name="writer" value="<?php echo $row->writer?>"/>
                </label>
            </li>
            <li>
                <label>
                    내용
                    <input type="text" name="content" value="<?php echo $row->content?>"/>
                </label>
            </li>
        </ul>
        <p>
            <button type="button" onclick="history.back()">취소</button>
            <button type="submit">완료</button>
        </p>
    </fieldset>
</form>
