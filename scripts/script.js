import {loadModel} from "../scripts/page_scripts/model.js";
import {errorModel} from "../scripts/page_scripts/errorModel.js";
import {video_upload} from "../scripts/page_scripts/video_upload.js";
window.onload = function(){
    //console.clear();
    try{
        errorModel()
    }
    catch{
        console.log("There are no models to handel the errors in submition");
    }
    finally{
        try{
            //slider function is defined in page_elements/hero_slider.
            loadModel();
        }
        catch{
            console.log("Slider has a problem");
        }
        finally{
            try{
                video_upload();
            }
            catch{
                console.log("upload js has problem");
            }
            finally{

            }
        }
    }
}
