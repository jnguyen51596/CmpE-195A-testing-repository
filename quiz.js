
function showA()
{
    document.getElementById("box").style.display = "initial";
    document.getElementById("box2").style.display = "none";
    document.getElementById("box3").style.display = "none";
}
function showB()
{
    document.getElementById("box").style.display = "none";
    document.getElementById("box2").style.display = "initial";
    document.getElementById("box3").style.display = "none";
}

function showC()
{
    document.getElementById("box").style.display = "none";
    document.getElementById("box2").style.display = "none";
    document.getElementById("box3").style.display = "initial";
}

function submitQuiz()
{
    loadDatabase("excuteQuizSubmit.php", function ()
    {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            window.location('quiz-endPage.html');
        }
    });
}



