


export function initGridTableExamle() {
  return {
    table: null,
    config: {
      columns: [
        // Column definitions...
        {
          id: "id",
          name: "id",
        },
        {
          id: "area",
          name: "Area",
          formatter: (cell) =>
            Gridjs.html(`<span class="mx-2">${cell}</span>`),
        },
        {
          id: "property",
          name: "property name",
          formatter: (cell) =>
            Gridjs.html(`<span class="mx-2">${cell}</span>`),
        },
        {
          id: "address",
          name: "Address",
        },
        {
          id: "city",
          name: "City",
        },
        {
          id: "state",
          name: "state",
        },
        {
          id: "property_code",
          name: "property code",
        },
        {
          id: "location_type",
          name: "location type",
        },

        {
          name: "Actions",
          sort: false,
          name: "Actions",
          sort: false,

          formatter: (cell, row) =>

            Gridjs.html(`
            
          <div class="flex justify-center space-x-2">
          <a href="/properties/${row.id}/edit" class="btn h-8 w-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
          <i class="fa fa-edit"></i>
        </a>
                <div class="flex justify-center space-x-2">
                  <a href="#" class="btn h-8 w-8 p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25" onclick="event.preventDefault(); confirmDelete('${row.id
              }');">
                      <i class="fa fa-trash-alt"></i>
                  </a>
              </div>
            </div>`),
        },
      ],
      sort: true,
      search: true,
      pagination: {
        enabled: true,
        limit: 10,
      },
    },

    async init() {
      const response = await fetch("/properties/list");
      const data = await response.json();
      console.log(data);
      this.config.data = data;

      this.table = new Gridjs.Grid(this.config).render(this.$root);
    },
    deleteItem() {
      this.$notification({
        text: "Item remove action",
        variant: "warning",
      });
    },
    editItem() {
      this.$notification({ text: "Item edit action", variant: "info" });
    },
  };
}
