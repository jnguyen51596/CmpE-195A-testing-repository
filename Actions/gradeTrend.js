function getTrend() {
    // gradesResponse = getRemote("getGrades");
    // gradesArray = JSON.parse(gradesResponse);
    
    var courseID = sessionStorage.getItem('courseID');
    
    return $.ajax({
        type: "POST",
        data: {courseID: courseID},
        url: "/Actions/gradeTrend.php",
        async: false
    }).responseText;

}

function displayTrend() {
    var grades = getTrend();
    var gradesArray = JSON.parse(grades);
    
    gradesArray.sort(function(ts1, ts2) {
        return new Date(ts1.timestamp).getTime() - new Date(ts2.timestamp).getTime();
    }); 
    
    var score = 0;
    var total = 0;
    var twoWeekScore = 0;
    var twoWeekTotal = 0;
    var mostRecentDate = new Date(gradesArray[gradesArray.length - 1]['timestamp']).getTime();
    var cutOffDate = mostRecentDate - (1000 * 60 * 60 * 24 * 7 * 2);
    
    for (var i = 0; i < gradesArray.length; i++) {

        if (gradesArray[i]['score'] != null)
        {
            score += parseInt(gradesArray[i]['score']);
            total += parseInt(gradesArray[i]['total']);
            
            if (new Date(gradesArray[i]['timestamp']).getTime() >= cutOffDate)
            {
                twoWeekScore += parseInt(gradesArray[i]['score']);
                twoWeekTotal += parseInt(gradesArray[i]['total']);
            }
        }
    }
    

    var pointsTag = score + "/" + total;
    var twoWeekPointsTag = twoWeekScore + "/" + twoWeekTotal;
    var resultTag = '';
    
    var percentage = (parseInt(score) / parseInt(total) * 100).toFixed(2);
    var twoWeekPercentage = (parseInt(twoWeekScore) / parseInt(twoWeekTotal) * 100).toFixed(2);
    
    // pointsTag += " " + (percentage).toFixed(2);
    // twoWeekPointsTag += " " + (twoWeekPercentage).toFixed(2);
    
    // if (percentage >= 90) { pointsTag += " A"; }
    // else if (percentage >= 80) { pointsTag += " B"; }
    // else if (percentage >= 70) { pointsTag += " C"; }
    // else if (percentage >= 60) { pointsTag += " D"; }
    // else { pointsTag += " F"; }
    
    var difference = percentage - twoWeekPercentage;
    var statsTag = "Your grade over the past 2 weeks is " + twoWeekPercentage + "% while your overall grade is " + percentage + "%. This means your grade ";
    if (difference == 0) {
        document.getElementById("gradeStatus").setAttribute("title", "No change in grade trend!");
        statsTag += "has not changed.";
    }
    else if (difference >= 5) {
        document.getElementById("gradeStatus").setAttribute("style", "font-weight:bold; color:red");
        document.getElementById("gradeStatus").setAttribute("title", "Your grade has been trending down!");
        statsTag += "has been trending downwards by ";
    }
    else if (difference <= 5) {
        document.getElementById("gradeStatus").setAttribute("style", "font-weight:bold; color:green");
        document.getElementById("gradeStatus").setAttribute("title", "Your grade has been trending up!");
        statsTag += "has been trending upwards by ";
    }

    
    statsTag += Math.abs(difference) + "%.";

    if (!isNaN(difference) || !isNaN(twoWeekPercentage)) {
        $('#trendStats').append(statsTag);
    }
    
    // $('#total-points').append("your total points: " + pointsTag);
    // $('#two-week-points').append("your points over two weeks: " + twoWeekPointsTag);
    // $('#result').append("your result: " + resultTag);
}