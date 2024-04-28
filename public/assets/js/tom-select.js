(function () {
  "use strict";

  // /* default input */
  // new TomSelect("#input-tags", {
  //   persist: false,
  //   createOnBlur: true,
  //   create: true
  // });

  /* Basic select */
  // new TomSelect("#select-beast", {
  //   create: true,
  //   sortField: {
  //     field: "text",
  //     direction: "asc"
  //   }
  // });

  /* Basic select */
  new TomSelect("#supplier", {
    create: true,
    sortField: {
      field: "text",
      direction: "asc"
    }
  });

  new TomSelect("#customer", {
    create: true,
    sortField: {
      field: "text",
      direction: "asc"
    }
  });


  // /* diasble select */
  // new TomSelect("#select-beast-disabled");
  //
  // /* Multiple select */
  // new TomSelect("#select-state", {
  //   maxItems: 8
  // });
})();