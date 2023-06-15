// Clone the input field class
function CloneInputDom(className) {
    const nodes = document.querySelectorAll(`.${className}`);
    const currentExistingInput = nodes.length;

    // prevent company to have more than 3 phone numbers
    if (className === 'phones' && currentExistingInput >= 3) {
        return;
    }

    // copy only one and it's the first input
    const node = nodes[0];

    // clone the node
    let clone = node.cloneNode(true);

    // reset the value for new input
    clone.value = '';
    // inrease the id for identification
    clone.id += nodes.length;

    node.parentNode.appendChild(clone);
}

function PopBackInputDom(className) {
    let nodes = document.querySelectorAll(`.${className}`);
    const currentExistingInput = nodes.length;

    if (currentExistingInput <= 1) {
        alert('You must have at least one input left')
        return;
    }

    // remove last input
    nodes[currentExistingInput - 1].remove();
}