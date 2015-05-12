/*
*	Preview Image that is open by input:file
*/
jQuery.fn.imageViewer = function(target,fn){
	var exec = function(param){
		var preview = document.querySelector(param.img);
		var file    = param.input.files[0];
		var reader  = new FileReader();

		reader.onloadend = function () {
			preview.src = reader.result;
		}

		if (file) {
			reader.readAsDataURL(file);
		} else {
			preview.src = "";
		}
		return [preview,file];
	}; 

	this.on('change',function(){
		exec({
			img		: target,
			input	: this,
		});
		if(typeof(fn) === "function")
		fn();
	});

	return this;
}


function dataURItoBlob(dataURI) {
    var binary = atob(dataURI.split(',')[1]);
    var array = [];
    for(var i = 0; i < binary.length; i++) {
        array.push(binary.charCodeAt(i));
    }
    return new Blob([new Uint8Array(array)], {type: 'image/jpeg'});
}