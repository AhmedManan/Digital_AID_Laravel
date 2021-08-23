
<style class="cp-pen-styles">@import url(https://fonts.googleapis.com/icon?family=Material+Icons);
  @import url("https://fonts.googleapis.com/css?family=Raleway");

  .wrapper {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
        -ms-flex-direction: row;
            flex-direction: row;
    -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
  }
  
  h1 {
    font-family: inherit;
    margin: 0 0 .75em 0;
    color: #728c8d;
    text-align: center;
  }
  
  .box {
    display: block;
    min-width: 150px;
    height: 150px;
    margin: 10px;
    background-color: white;
    border-radius: 5px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    -webkit-transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    overflow: hidden;
    position: relative;
    
  }
  
  .upload-options {
    position: absolute;
    bottom: 0px;
    height: 45px;
    width: 100%;
    background-color: cadetblue;
    cursor: pointer;
    overflow: hidden;
    text-align: center;
    -webkit-transition: background-color ease-in-out 150ms;
    transition: background-color ease-in-out 150ms;
  }
  .upload-options:hover {
    background-color: #7fb1b3;
  }
  .upload-options input {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
  }
  .upload-options label {

    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    width: 100%;
    height: 100%;
    font-weight: 400;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer;
    overflow: hidden;
  }
  .upload-options label::after {
    content: 'add';
    font-family: 'Material Icons';
    position: absolute;
    font-size: 2.5rem;
    color: #e6e6e6;
    /* top: calc(50% - 2.5rem); */
    left: calc(50% - 1.25rem);
    z-index: 0;
  }
  .upload-options label span {
    display: inline-block;
    width: 50%;
    height: 100%;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    vertical-align: middle;
    text-align: center;
  }
  .upload-options label span:hover i.material-icons {
    color: lightgray;
  }
  
  .js--image-preview {
    height: 125px;
    width: 100%;
    position: relative center;
    overflow: hidden;
    background-image: url("");
    background-color: white;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
  }
  .js--image-preview::after {
    content: "photo_size_select_actual";
    font-family: 'Material Icons';
    position: relative center;
    font-size: 4.5em;
    color: #e6e6e6;
    top: calc(50% - 3rem);
    left: calc(50% - 2.25rem);
    z-index: 0;
  }
  .js--image-preview.js--no-default::after {
    display: none;
  }
  
  i.material-icons {
    -webkit-transition: color 100ms ease-in-out;
    transition: color 100ms ease-in-out;
    font-size: 2.25em;
    line-height: 55px;
    color: white;
    display: block;
  }
  
  .drop {
    display: block;
    position: absolute;
    background: rgba(95, 158, 160, 0.2);
    border-radius: 100%;
    -webkit-transform: scale(0);
            transform: scale(0);
  }
  
  .animate {
    -webkit-animation: ripple 0.4s linear;
            animation: ripple 0.4s linear;
  }
  
  @-webkit-keyframes ripple {
    100% {
      opacity: 0;
      -webkit-transform: scale(2.5);
              transform: scale(2.5);
    }
  }
  
  @keyframes ripple {
    100% {
      opacity: 0;
      -webkit-transform: scale(2.5);
              transform: scale(2.5);
    }
  }
  </style>

<script >
function initImageUpload(box) {
  let uploadField = box.querySelector('.image-upload');

  uploadField.addEventListener('change', getFile);

  function getFile(e){
    let file = e.currentTarget.files[0];
    checkType(file);
  }
  
  function previewImage(file){
    let thumb = box.querySelector('.js--image-preview'),
        reader = new FileReader();

    reader.onload = function() {
      thumb.style.backgroundImage = 'url(' + reader.result + ')';
    }
    reader.readAsDataURL(file);
    thumb.className += ' js--no-default';
  }

  function checkType(file){
    let imageType = /image.*/;
    if (!file.type.match(imageType)) {
      throw 'Datei ist kein Bild';
    } else if (!file){
      throw 'Kein Bild gewählt';
    } else {
      previewImage(file);
    }
  }
  
}

// initialize box-scope
var boxes = document.querySelectorAll('.box');

for (let i = 0; i < boxes.length; i++) {
  let box = boxes[i];
  initDropEffect(box);
  initImageUpload(box);
}



/// drop-effect
function initDropEffect(box){
  let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;
  
  // get clickable area for drop effect
  area = box.querySelector('.js--image-preview');
  area.addEventListener('click', fireRipple);
  
  function fireRipple(e){
    area = e.currentTarget
    // create drop
    if(!drop){
      drop = document.createElement('span');
      drop.className = 'drop';
      this.appendChild(drop);
    }
    // reset animate class
    drop.className = 'drop';
    
    // calculate dimensions of area (longest side)
    areaWidth = getComputedStyle(this, null).getPropertyValue("width");
    areaHeight = getComputedStyle(this, null).getPropertyValue("height");
    maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));

    // set drop dimensions to fill area
    drop.style.width = maxDistance + 'px';
    drop.style.height = maxDistance + 'px';
    
    // calculate dimensions of drop
    dropWidth = getComputedStyle(this, null).getPropertyValue("width");
    dropHeight = getComputedStyle(this, null).getPropertyValue("height");
    
    // calculate relative coordinates of click
    // logic: click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center
    x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10)/2);
    y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10)/2) - 30;
    
    // position drop and animate
    drop.style.top = y + 'px';
    drop.style.left = x + 'px';
    drop.className += ' animate';
    e.stopPropagation();
    
  }
}
</script>