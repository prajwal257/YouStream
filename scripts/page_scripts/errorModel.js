export var errorModel = function(){
    //now for model buttons.
    var model = document.getElementsByClassName("model")[0];
    var model_ok_button = document.getElementsByClassName("submit_error");
    for(let i=0; i<model_ok_button.length; i++){
        model_ok_button[i].addEventListener("click", function(){
            model.style.display = "none";
        })
    }

    // console.log("body is loaded");
    // var model = document.getElementsByClassName("model");
    // var close = document.getElementsByClassName("close_model");
    // var trigger = document.getElementsByClassName("trigger_element");
    // console.log(close);
    // for(let i=0; i<trigger.length;i++){
    //     trigger[i].addEventListener("click", function(){
    //         model[i].classList.toggle("visible");
    //         console.log("closing now");
    //     })
    //     close[i].addEventListener("click", function(){
    //         model[i].classList.toggle("visible");
    //         console.log("closing now");
    //     })
    // }
    
}