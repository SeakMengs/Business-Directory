// Select the rating container element
const ratingContainer = document.querySelector("#star-rating");
const totalStar = 5;
// 	Null coalescing operator (??) to check if user has rated
const checkedStar = currentUserRateNumber;
const unCheckedStar = totalStar - checkedStar;

console.log(checkedStar);

function renderStar(ratingContainer, checkedStar, unCheckedStar) {
    // reset the rating container
    ratingContainer.innerHTML = "";

    // Loop to create checked that user has rated
    for (let i = 0; i < checkedStar; i++) {
        const star = document.createElement("span");
        star.classList.add("fa", "fa-star", "checked");
        star.dataset.rating = i + 1;

        // Event listener for click event to submit the rating
        star.addEventListener('click', () => {
            const rateInput = document.querySelector('#hidden-rate-input');
            rateInput.value = star.dataset.rating;

            const rateSubmit = document.querySelector('#hidden-rate-submit');
            rateSubmit.click();
        })

        ratingContainer.appendChild(star);
    }

    // Loop the remaining stars that user has not rated
    for (let i = 0; i < unCheckedStar; i++) {
        const star = document.createElement("span");
        star.classList.add("fa", "fa-star", "unchecked");
        star.dataset.rating = checkedStar + i + 1;

        // Event listener for click event to submit the rating
        star.addEventListener('click', () => {
            const rateInput = document.querySelector('#hidden-rate-input');
            rateInput.value = star.dataset.rating;

            const rateSubmit = document.querySelector('#hidden-rate-submit');
            rateSubmit.click();
        })

        ratingContainer.appendChild(star);
    }
}

renderStar(ratingContainer, checkedStar, unCheckedStar);

// Event listener for mouseover event
ratingContainer.addEventListener("mouseover", event => {
    const rating = event.target.dataset.rating;
    if (rating) {
        // Iterate over all stars and update their classes based on the rating
        ratingContainer.querySelectorAll("span").forEach(star => {
            if (star.dataset.rating <= rating) {
                star.classList.remove("unchecked");
                star.classList.add("checked");
            } else {
                star.classList.remove("checked");
                star.classList.add("unchecked");
            }
        });
    }
});

// Event listener for mouseout event
ratingContainer.addEventListener("mouseout", event => {
    // // Reset all star classes to unchecked
    // ratingContainer.querySelectorAll("span").forEach(star => {
    //     star.classList.remove("checked");
    //     star.classList.add("unchecked");
    // });
    renderStar(ratingContainer, checkedStar, unCheckedStar);
});