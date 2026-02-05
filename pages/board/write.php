<form action="" method="post">
    <fieldset>
        <legend>글작성</legend>
        <input type="hidden" name="action" value="insert">
        <ul>
            <li>
                <label>
                    제목
                    <input type="text" name="subject"/>
                </label>
            </li>
            <li>
                <label>
                    작성자
                    <input type="text" name="writer"/>
                </label>
            </li>
            <li>
                <label>
                    내용
                    <input type="text" name="content"/>
                </label>
            </li>
        </ul>
        <p>
            <button type="button" onclick="history.back()">취소</button>
            <button type="submit">완료</button>
        </p>
    </fieldset>
</form>