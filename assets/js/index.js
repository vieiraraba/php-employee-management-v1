const getJSONData = async () => {
    const url = '../resources/employees.json';
    try {
        const rawData = await fetch(url);
        const data = await rawData.json();
        return data;
    } catch (error) {
        alert("Error in the database");
    }
};

$("#jsGrid").jsGrid({
    width: "80%",
    height: "auto",
    inserting: true,
    editing: true,
    sorting: true,
    paging: true,
    autoload: true,
    pageSize: 8,
    pageButtonCount: 5,
    deleteConfirm: "Do you really want to delete data?",
    controller: {
        /* Function to load data into the table */
        loadData: function () {
            var d = $.Deferred();
            return $.ajax({
                url: "../resources/employees.json",
                type: "GET",
                dataType: "json",
                success: function (data) {
                    return d.resolve(data);
                },
            });
        },
        /* Function to add a new employee */
        insertItem: async function (item) {
            let d = $.Deferred();
            let res = await getJSONData();
            let newID = res[res.length - 1].id + 1;
            console.log(newID);
            item["id"] = newID;
            return $.ajax({
                type: "POST",
                url: "../src/library/employeeController.php",
                data: item,
                success: function (data) {
                    return d.resolve(data);
                },
            });
        },
        /* Function to update an employee's data */
        updateItem: function (item) {
            var d = $.Deferred();
            console.log(item);
            return $.ajax({
                type: "PUT",
                url: "../src/library/employeeController.php",
                data: item,
                success: function (data) {
                    return d.resolve(data);
                },
            });
        },
        /* Function to delete an employee's data */
        deleteItem: function (item) {
            return $.ajax({
                type: "DELETE",
                url: "./library/employeeController.php",
                data: item,
            }).done(function () {
                console.log("data deleted");
            });
        },
    },
    fields: [{
            name: "id",
            title: "ID",
        },
        {
            name: "name",
            title: "Name",
            type: "text",
            headercss: "table-header",
            css: "table-row",
            width: 35,
            validate: "required",
        },
        {
            name: "email",
            title: "Email",
            type: "text",
            headercss: "table-header",
            css: "table-row",
            width: 75,
            validate: "required",
        },
        {
            name: "age",
            title: "Age",
            type: "number",
            headercss: "table-header",
            css: "table-row",
            width: 20,
            validate: function (age) {
                if (age > 0) {
                    return true;
                }
            },
        },
        {
            name: "streetAddress",
            title: "Street address",
            type: "text",
            headercss: "table-header",
            css: "table-row",
            width: 25,
        },
        {
            name: "city",
            title: "City",
            type: "text",
            headercss: "table-header",
            css: "table-row",
            width: 60,
        },
        {
            name: "state",
            title: "State",
            type: "text",
            headercss: "table-header",
            css: "table-row",
            width: 20,
        },
        {
            name: "postalCode",
            title: "Postal code",
            type: "number",
            headercss: "table-header",
            css: "table-row",
            width: 30,
        },
        {
            name: "phoneNumber",
            title: "Phone number",
            type: "number",
            headercss: "table-header",
            css: "table-row",
            width: 45,
        },
        {
            type: "control",
            headercss: "table-header",
            css: "table-row",

        },
    ],
    /* Redirects to the employee page with the employee's data. */
    rowClick: function (employeeId) {
        location.href = "./employee.php?employee=" + employeeId.item.id;
    },
    /* Redirects to the employee page with the employee's data. */
    onItemUpdated: function () {
        let toast = document.getElementById("update-toast");
        toast.classList.remove("toast");
        setTimeout(() => {
            toast.classList.add("toast");
        }, 3000);
    },
    /* Displays a message when deleting employee data */
    onItemDeleted: function () {
        let toast = document.getElementById("delete-toast");
        toast.classList.remove("toast");
        setTimeout(() => {
            toast.classList.add("toast");
        }, 3000);
    },
});

/* Hide the id field */
$("#jsGrid").jsGrid("fieldOption", "id", "visible", false);

const editBtn = document.getElementById("editBtn");
editBtn.addEventListener("click", successUpdate());

/* Function to display a message when updating employee data */
function successUpdate() {
    const div = document.getElementById("success");
    if (div) {
        let success = "<b>Success!</b> Employee added successfully";
        div.innerHTML = success;
        setTimeout(() => {
            div.remove();
        }, 3000);
    }
}