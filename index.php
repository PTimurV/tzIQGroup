<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Калькулятор вклада</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.js"></script>
</head>
<body>
    <div id="header">
        <div class="header-container">
            <div class="header-high">
                <div class="logo">
                    <img src="logo.png" alt="World Bank Publications" />
                </div>
                <div class="contacts">
                    <p>8-800-100-5005</p>
                    <p>+7 (3452) 522-000</p>
                </div>
            </div>
            
            <nav class="header-low">
                <ul class="menu">
                    <li><a href="#">Кредитные карты</a></li>
                    <li><a href="#">Вклады</a></li>
                    <li><a href="#">Дебетовая карта</a></li>
                    <li><a href="#">Страхование</a></li>
                    <li><a href="#">Друзья</a></li>
                    <li><a href="#">Интернет-банк</a></li>
                </ul>
            </nav>
            
        </div>
    </div>

    <main>
        <div class="breadcrumbs">
            <a href="#">Главная</a> - <a href="#">Вклады</a> -
            <span>Калькулятор</span>
        </div>
        <section class="calculator">
            <h1>Калькулятор</h1>
            <form action="calc.php" method="post">
                <div class="form-group">
                    <label for="date">Дата оформления вклада</label>
                    <input type="text" id="date" name="date" />
                </div>
                <div class="form-group">
                    <label for="amount">Сумма вклада</label>
                    <input id="amount" name="amount" value="10000"></input>
                    <div class="slider">
                        <div id="amount-slider"></div>
                        <div class="slider-labels">
                            <span id="amount-min">1000</span>
                            <span id="amount-max">3000000</span>
                        </div>
                    </div>
                    
                    
                </div>
                
					<div class="form-group">
						<label for="term">Срок вклада</label>
						<select id="term" name="term">
							<option value="1">1 год</option>
							<option value="2">2 года</option>
							<option value="3">3 года</option>
                            <option value="4">4 года</option>
                            <option value="5">5 лет</option>
						</select>
					</div>
					<div class="form-group-replenish">
						<label>Пополнение вклада</label>
						<input
							type="radio"
							id="replenishNo"
							name="replenish"
							value="0"
							checked
						/>
						<label for="replenishNo">Нет</label>
						<input type="radio" id="replenishYes" name="replenish" value="1" />
						<label for="replenishYes">Да</label>
					</div>
					<div class="form-group">
						<label for="replenishAmount">Сумма пополнения вклада</label>
                        <input id="replenishAmount" name="replenishAmount" value="10000"></input>
						
                         <div class="slider">
                            <div id="replenishAmount-slider" ></div>
                            <div class="slider-labels">
                                <span id="amount-min">1000</span>
                                <span id="amount-max">3000000</span>
                            </div>
                        </div>
						
					</div>
                <div class="form-group">
                    <button type="submit" class="calculate-btn">
                        Рассчитать
                    </button>
                    <p>Результат: <span id="result"></span> руб.</p>
                </div>
            </form>
        </section>
    </main>

    <div id="footer">
        <div class="footer-container">
            <nav>
                <ul class="menu">
                    <li><a href="#">Кредитные карты</a></li>
                    <li><a href="#">Вклады</a></li>
                    <li><a href="#">Дебетовая карта</a></li>
                    <li><a href="#">Страхование</a></li>
                    <li><a href="#">Друзья</a></li>
                    <li><a href="#">Интернет-банк</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <script src="scripts.js"></script>
    <script>
        $(function () {
            $('#date').datepicker({
                dateFormat: 'dd.mm.yy',
            })
            var today = new Date();
            var day = String(today.getDate()).padStart(2, '0');
            var month = String(today.getMonth() + 1).padStart(2, '0');
            var year = today.getFullYear();

            var todayFormatted = day + '.' + month + '.' + year;
            $('#date').val(todayFormatted);
        })
    </script>
</body>
</html>