function getTrend() {
    // gradesResponse = getRemote("getGrades");
    // gradesArray = JSON.parse(gradesResponse);
    
    var courseID = sessionStorage.getItem('courseID');
    
    return $.ajax({
        type: "POST",
        data: {courseID: courseID},
        url: "/Actions/gradeTrend.php",
        async: false,
        success: function() { console.log('success'); },
        error: function() { console.log('error'); }
    }).responseText;

}

function displayTrend() {
    var grades = getTrend();
    console.log(grades);
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
        score += parseInt(gradesArray[i]['score']);
        total += parseInt(gradesArray[i]['total']);
        
        if (new Date(gradesArray[i]['timestamp']).getTime() >= cutOffDate)
        {
            twoWeekScore += parseInt(gradesArray[i]['score']);
            twoWeekTotal += parseInt(gradesArray[i]['total']);
        }
    }
    

    var pointsTag = score + "/" + total;
    var twoWeekPointsTag = twoWeekScore + "/" + twoWeekTotal;
    var resultTag = '';
    
    var percentage = parseInt(score) / parseInt(total) * 100
    var twoWeekPercentage = parseInt(twoWeekScore) / parseInt(twoWeekTotal) * 100
    
    pointsTag += " " + (percentage).toFixed(2);
    twoWeekPointsTag += " " + (twoWeekPercentage).toFixed(2);
    
    if (percentage >= 90) { pointsTag += " A"; }
    else if (percentage >= 80) { pointsTag += " B"; }
    else if (percentage >= 70) { pointsTag += " C"; }
    else if (percentage >= 60) { pointsTag += " D"; }
    else { pointsTag += " F"; }
    
    var difference = percentage - twoWeekPercentage;
    if (difference == 0) {
        document.getElementById("gradeStatus").setAttribute("title", "No change in grade trend!");
    }
    else if (difference >= 5) {
        document.getElementById("gradeStatus").setAttribute("style", "font-weight:bold; color:red");
        document.getElementById("gradeStatus").setAttribute("title", "Your grade has been trending down!");
    }
    else if (difference <= 5) {
        resultTag = 'you doing pretty good dude';
        document.getElementById("gradeStatus").setAttribute("style", "font-weight:bold; color:green");
        document.getElementById("gradeStatus").setAttribute("title", "Your grade has been trending up!");
    }
    
    $('#total-points').append("your total points: " + pointsTag);
    $('#two-week-points').append("your points over two weeks: " + twoWeekPointsTag);
    $('#result').append("your result: " + resultTag);
}