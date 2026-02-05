<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$idx = $_GET['idx'] ?? null;
if (!$idx) {
    echo "잘못된 접근";
    exit;
}


$stmt = $db->prepare("SELECT * FROM board WHERE idx = ?");
$stmt->execute([$idx]);
$row = $stmt->fetch(PDO::FETCH_OBJ);

if (!$row) {
    echo "존재하지 않는 게시글";
    exit;
}
?>

<h2>view</h2>


<form action="./?page=action" method="post" name="deleteFrm">
    <input type="hidden" name="action" value="delete">
    <input type="hidden" name="idx" value="<?= $idx ?>">
</form>


<ul>
    <li><?= htmlspecialchars($row->idx) ?></li> 
    <li><?= htmlspecialchars($row->subject) ?></li>
    <li><?= htmlspecialchars($row->writer) ?></li>
    <li><?= htmlspecialchars($row->reg_date) ?></li>
    <li><?= nl2br(htmlspecialchars($row->content)) ?></li>
</ul>


<p>
    <a href="./">글목록</a>

    <a href="./?page=update&idx=<?= $idx ?>">글수정</a>

    <!-- 삭제 -->
    <a href="#"
       onclick="if(confirm('정말 삭제하시겠습니까?')) { document.deleteFrm.submit(); } return false;">
       글삭제
    </a>

    <a href="./?page=write">글작성</a>
</p>
