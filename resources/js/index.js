showLoader();

window.addEventListener('load', () => {
  hideLoader();
})

addEvent("body", "click", () => {
  if(isNull(".searchbar")){
    dynamicStyling(".searchbar", "hidden");
    dynamicStyling(".searchbar", "flex", "remove");
  }

  if(window.innerWidth < 576){
    animated(".filter-container", {
      left: "-5rem",
      opacity: "0%",
      visibility: "hidden"
    }, {
      duration: 200,
      easing: "ease-in",
      fill: "forwards"
    })

    animated(".sidebar", {
      left: "-60%",
      opacity: "0%",
      visibility: "hidden"
    }, {
      duration: 250,
      easing: "ease-in",
      fill: "forwards"
    })
  }
})

addEvent(".search-btn", "click", (e) => {
  e.stopPropagation();
  dynamicStyling(".searchbar", "hidden", "remove");
  dynamicStyling(".searchbar", "flex");
})

addEvent(".searchbar", "click", (e) => {
  e.stopPropagation();
})

addEvent(".menu-btn", "click", () => {
  animated(".nav__menu", {
    top: 0,
    opacity: "100%",
    visibility: "visible"
  }, {
    duration: 200,
    easing: "ease-in",
    fill: "forwards"
  })
})

addEvent(".close-nav", "click", () => {
  animated(".nav__menu", {
    top: "-4rem",
    opacity: "0%",
    visibility: "hidden"
  }, {
    duration: 200,
    easing: "ease-in",
    fill: "forwards"
  })
})

addEvent(".show-filter", "click", (e) => {
  e.stopPropagation();
  animated(".filter-container", {
    left: 0,
    opacity: "100%",
    visibility: "visible"
  }, {
    duration: 200,
    easing: "ease-in",
    fill: "forwards"
  })
})

addEvent(".minus-btn", "click", (e) => {
  const parent = e.target.parentElement;
  const count = parent.querySelector(".p_counter");
  let quantity = parseInt(count.textContent.trim()) <= 1 ? 1 : parseInt(count.textContent.trim()) - 1;
  count.textContent = quantity;
}, "all")

addEvent(".add-btn", "click", (e) => {
  const parent = e.target.parentElement;
  const count = parent.querySelector(".p_counter");
  let quantity = parseInt(count.textContent.trim()) + 1;
  count.textContent = quantity;
}, "all")

addEvent(".radio", "click", (e) => {
  e.target.classList.toggle("selected");
}, "all")

addEvent(".setup-btn", "click", () => {
  const form = document.querySelector("#shipping-form");
  form.classList.toggle("hidden");
})

addEvent(".show-sidebar", "click", (e) => {
  e.stopPropagation();
  
  animated(".sidebar", {
    left: 0,
    opacity: "100%",
    visibility: "visible"
  }, {
    duration: 250,
    easing: "ease-in",
    fill: "forwards"
  })
})

addEvent(".upload-container", "click", ({ target }) => {
  const input = target.querySelector("input");
  input.click();
}, "all")

addEvent(".upload-input", "change", (e) => {
  previewUpload(e);
}, "all")

addEvent(".show-password", "click", (e) => {
  togglePassword(e);
}, "all")