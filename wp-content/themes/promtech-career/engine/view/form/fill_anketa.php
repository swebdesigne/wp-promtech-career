<div class="question-form-container">
    <h4>Заполните анкету</h4>
    <form action="" class="question-form">
        <input type="hidden" name="required" value="">
        <div class="form-row">
            <input type="text" class="form-item" placeholder="Имя *" id="" name="" required>
            <input type="text" class="form-item" placeholder="Фамилия *" id="" name="" required>
        </div>
        <div class="form-row">
            <input type="text" class="form-item" placeholder="Email *" id="" name="" required>
            <input type="text" class="form-item" placeholder="Телефон *" id="" name="" required>
        </div>
        <div class="form-row">
            <label for="upload-photo" class="custom-input-file form-item">
                <div class="custom-input-file__click">
                    <p>Резюме</p>
                    <span class="icon-upload"></span>
                </div>
                <input id="upload-photo" class="hidden-file" type="file" placeholder="Резюме" id="" name="">
            </label>
            <div class="form-item">
                <select name="" id="citySelect" class="custom-select" required>
                    <option value="" disabled>Выберите город</option>
                    <?php foreach($args['city'] as $city) : ?>
                        <option value="<?= $city->post_title; ?>"><?= $city->post_title; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-row col1">
            <input type="text" class="form-item" placeholder="Специализация *" id="" name="">
        </div>
        <div class="form-row col1">
            <textarea name="" id="" rows="5" class="form-item" placeholder="Сообщение"></textarea>
        </div>
        <div class="form-row col-submit">
            <div class="form-item">
                <input type="checkbox" id="#migration" class="custom-checkbox">
                <label for="#migration" class="big-label"> Готовность к переезду</label>
            </div>
            <input type="submit" class="btn orange-btn form-item" value="Отправить анкету">
        </div>
        <div class="form-row right-content">
            <div class="form-item">
                <input id="agree" name="agree" type="checkbox" class="custom-checkbox">
                <label for="agree"> Я даю согласие на обработку персональных данных</label>
            </div>
            <div class="form-item">
                <input id="politic" name="politic" type="checkbox" class="custom-checkbox">
                <label for="politic"> Ознакомлен с Политикой конфеденциальности</label>
            </div>
        </div>
    </form>
</div>