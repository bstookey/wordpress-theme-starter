/**
 * File: mobile-menu.js
 *
 * Create an accordion style dropdown.
 */

// Make sure everything is loaded first.
if (
  ("complete" === document.readyState || "loading" !== document.readyState) &&
  !document.documentElement.doScroll
) {
  wdsMobileMenu();
} else {
  document.addEventListener("DOMContentLoaded", wdsMobileMenu);
}

/**
 * Handle our mobile menus.
 *
 * @since January 31, 2020
 * @author Corey Collins
 */
function wdsMobileMenu() {
  const subMenuParentItem = document.querySelectorAll(
    ".mobile-menu li.menu-item-has-children, .utility-navigation li.menu-item-has-children"
  );

  subMenuParentItem.forEach((subMenuParent) => {
    const menuItem = subMenuParent.querySelector("a");

    menuItem.innerHTML +=
      '<button type="button" aria-expanded="false" class="parent-indicator" aria-label="Open submenu"><span class="down-arrow"></span></button>';

    const subMenuTrigger = document.querySelectorAll(".parent-indicator");

    subMenuTrigger.forEach((trigger) => {
      trigger.addEventListener("click", toggleSubmenu);
    });
  });

  /**
   * Open/Close a submenu.
   *
   * @param {Object} event The triggered event.
   *
   * @since January 31, 2020
   * @author Corey Collins
   */
  function toggleSubmenu(event) {
    event.preventDefault();

    const targetElement = event.target,
      targetParent = targetElement.parentNode.closest(
        ".menu-item-has-children"
      ),
      subMenu = targetParent.querySelector("ul.sub-menu");

    closeAllSubmenus(targetParent);
    maybeOpenSubmenu(targetParent, subMenu);
  }

  /**
   * Open a submenu.
   *
   * @param {Object} parent THe parent menu.
   * @param {Object} subMenu The submenu.
   *
   * @since January 31, 2020
   * @author Corey Collins
   */
  function maybeOpenSubmenu(parent, subMenu) {
    if (parent.classList.contains("is-visible")) {
      closeSubmenu(parent, subMenu);
      return;
    }

    // Expand the list menu item, and set the corresponding button aria to true.
    parent.classList.add("is-visible");
    parent
      .querySelector(".parent-indicator")
      .setAttribute("aria-expanded", true);

    // Slide the menu in.
    subMenu.classList.add("is-visible");
  }

  /**
   * Close a submenu.
   *
   * @param {Object} parent The parent item.
   * @param {Object} subMenu The submenu.
   *
   * @since January 31, 2020
   * @author Corey Collins
   */
  function closeSubmenu(parent, subMenu) {
    parent.classList.remove("is-visible");
    parent
      .querySelector(".parent-indicator")
      .setAttribute("aria-expanded", false);
    subMenu.classList.remove("is-visible");
  }

  /**
   * Close all open submenus on the same level/hierarchy as the menu we're trying to open.
   *
   * @param {Object} targetParent The target parent item.
   *
   * @since January 31, 2020
   * @author Corey Collins
   */
  function closeAllSubmenus(targetParent) {
    const submenuSiblings = getSiblings(targetParent);

    submenuSiblings.forEach((sibling) => {
      sibling.classList.remove("is-visible");

      if (sibling.querySelector(".parent-indicator")) {
        sibling
          .querySelector(".parent-indicator")
          .setAttribute("aria-expanded", false);
      }

      if (sibling.querySelector(".sub-menu")) {
        sibling
          .querySelector(".sub-menu")
          .classList.remove("is-visible", "animated", "slideInLeft");
      }
    });
  }

  /* eslint-disable func-style */
  /**
   * Find siblings of an item.
   *
   * @param {Object} element The element being opened.
   *
   * @since January 31, 2020
   * @author Corey Collins
   *
   * @return {Array} List of siblings.
   */
  const getSiblings = function (element) {
    const siblings = [];
    let sibling = element.parentNode.firstChild;

    while (sibling) {
      if (1 === sibling.nodeType && sibling !== element) {
        siblings.push(sibling);
      }

      sibling = sibling.nextSibling;
    }

    return siblings;
  };
}
