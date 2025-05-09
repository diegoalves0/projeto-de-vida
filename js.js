const imageField = document.querySelector("#image-field");
const imagePreview = document.querySelector("#image-preview");
const camera = document.querySelector("#camera");

const loadImage = (e) => {
    const filePath = e.target || window.event.srcElement;

    const file = filePath.files;

    const fileReader = new FileReader();

    imagePreview.classList.remove('hidden');

    camera.classList.add('hidden');
    camera.classList.remove('camera');

    fileReader.onload = () => {
        imagePreview.src = fileReader.result;
    };

    fileReader.readAsDataURL(file[0]);
};

imageField.addEventListener("change",loadImage);