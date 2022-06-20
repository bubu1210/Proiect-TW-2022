(function onLoad() {
  const mainContent = document.querySelector(".add-autograph");
  const newTagBtn = mainContent.querySelector("button#new-tag");
  newTagBtn.addEventListener("click", createNewTag);

  function createNewTag(_ev) {
    const newTagInput = mainContent.querySelector("input#tags");

    if (newTagInput && newTagInput.value) {
      const tagList = mainContent.querySelector("ul.tag-list");
      const newTag = createEditableTag(newTagInput.value, remove);

      tagList.insertAdjacentElement("beforeend", newTag);

      newTagInput.value = "";
      const removeBtn = newTag.querySelector(".remove-tag");
      removeBtn.addEventListener("click", remove);
    }
  }

  function remove(ev) {
    const tag = ev.path.find(node => node.matches("li.tag"));
    tag.remove();
  }
}());