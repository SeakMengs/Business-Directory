function addInput(className) {
    if (className == 'new-phones') {
        renderNewPhoneInput();
    } else if (className == 'new-galleries') {
        renderNewGalleryInput();
    } else if (className == 'new-services') {
        renderNewServiceInput();
    }
}

function PopBackInputDom(className) {
    let nodes = document.querySelectorAll(`.${className}`);
    const currentExistingInput = nodes.length;

    // if currentexistinginput = 0 then we don't want to remove anything
    if (currentExistingInput == 0) {
        return;
    }

    // remove last input
    nodes[currentExistingInput - 1].remove();
}

// it take two argument, the first one is the id that we will use for remove.
// the className will be used to check how many input left to prevent user from removing all input.
function removeInputById(id, className) {
    /*
     * get the column we want to detele by splitting the class name by '-'
     * Example: services-check, the split will convert to ['services', 'check']
     * then we access columnName by index 0 which is 'service'
     */
    const columnName = className.split('-')[0];

    // similar to above example, I take row id in order to delete in database
    const rowIdInDatabase = id.split('-')[2];

    let nodes = document.querySelectorAll(`.${className}`);
    // get the node that we want to delete
    const node = document.getElementById(id);

    const nodeInputChild = node.querySelector('input');

    if (node.style.opacity === '0.5') {
        alert('This input is already in delete state. Click submit to save changes ')
        return;
    }

    const currentExistingInput = findInputThatHasOpacityHalf(nodes);

    if (currentExistingInput <= 1) {
        alert('You must have at least one input left')
        return;
    }

    // change name to delete_ to check for what to delete and what to update
    nodeInputChild.name = `delete_${columnName}[]`;

    nodeInputChild.value = `${rowIdInDatabase}`;

    // change the opacity to 0.5 to indicate that this input is in delete state
    node.style.opacity = '0.5';
    node.style.display = 'none';
    // node.remove();
}

function findInputThatHasOpacityHalf(nodes) {
    let inputThatHasOpacityHalfCount = 0;
    const currentExistingInput = nodes.length;

    for (let i = 0; i < currentExistingInput; i++) {
        if (nodes[i].style.opacity === '0.5') {
            inputThatHasOpacityHalfCount++;
        }
    }

    return currentExistingInput - inputThatHasOpacityHalfCount;
}

function renderNewPhoneInput() {

    const newPhones = document.querySelectorAll('.new-phones');
    const currentNewPhones = newPhones.length;
    const existingPhones = document.querySelectorAll('.phones-check');
    let currentExistingPhones = 0;

    for (let i = 0; i < existingPhones.length; i++) {
        if (existingPhones[i].style.opacity !== '0.5') {
            currentExistingPhones++;
        }
    }

    if (currentExistingPhones + currentNewPhones >= 3) {
        alert('You can only have 3 phone numbers')
        return;
    }

    let parentNode = document.getElementById('phone-parent')
    //     `<input type="text" name="add_phone_number[]" class="form-control new-phones mb-2" id="phone">`

    let newInput = document.createElement('input');
    newInput.type = 'text';
    newInput.name = 'add_phone_number[]';
    newInput.className = 'form-control new-phones mb-2';
    newInput.id = 'phone';

    parentNode.appendChild(newInput)
}

function renderNewServiceInput() {
    let parentNode = document.getElementById('service-parent')

    // I don't use innerHTML because it will remove all the child node which reset the value of the input
    let newInput = document.createElement('input');
    newInput.type = 'text';
    newInput.name = 'add_service[]';
    newInput.className = 'form-control new-services mb-2';
    newInput.id = 'services';

    // `<input type="text" name="add_service[]" class="form-control new-services mb-2" id="services">`

    parentNode.appendChild(newInput)
}

function renderNewGalleryInput() {
    let parentNode = document.getElementById('gallery-parent')
    // `<input type="file" name="add_gallery[]" class="form-control new-galleries mb-2" id="gallery">`

    let newInput = document.createElement('input');
    newInput.type = 'file';
    newInput.name = 'add_gallery[]';
    newInput.className = 'form-control new-galleries mb-2';
    newInput.id = 'gallery';

    parentNode.appendChild(newInput)
}