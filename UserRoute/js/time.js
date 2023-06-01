var realTimeDatetimeDisplay = function() {
	var dateObj        = new Date(),
        dateYear       = dateObj.getFullYear(),
        dateMonth      = dateObj.getMonth() + 1,
        dateDay        = dateObj.getDate(),
        dateWeek       = dateObj.getDay(),
        timeHour       = dateObj.getHours(),
        timeMinutes    = dateObj.getMinutes(),
        timeSeconds    = dateObj.getSeconds(),
        weekNames      = ['日', '月', '火', '水', '木', '金', '土'],
        displayElement = document.getElementById('real-clockbox'),
        str            = '';

	// 一桁の場合は0を追加
	if (timeHour < 10)    timeHour    = '0' + timeHour;
	if (timeMinutes < 10) timeMinutes = '0' + timeMinutes;
	if (timeSeconds < 10) timeSeconds = '0' + timeSeconds;

	// 文字列の結合
	str  = dateMonth + '月' + dateDay + '日' + '（' + weekNames[dateWeek] + '） ';
	str += timeHour + '時' + timeMinutes + '分' + timeSeconds + '秒';

	// 出力
	if (displayElement) displayElement.innerHTML = str;

	// 繰り返し実行
	setTimeout(realTimeDatetimeDisplay, 1000);
};

realTimeDatetimeDisplay();
