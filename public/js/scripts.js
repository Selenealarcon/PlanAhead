document.addEventListener("DOMContentLoaded", function () {
    /**
     * Show de appropriate task form based on the task type
     */
    if ("{{ old('type') }}" === "basic") {
        $("#newTask .taskBasic").show();
    } else if ("{{ old('type') }}" === "list") {
        $("#newTask .taskList").show();
    }

    /**
     *Toggle task new options based on option selected at the input
     */
    $("#newTask .taskType").on("change", function () {
        var taskType = $("#newTask .taskType").val();
        if (taskType == "basic") {
            $("#newTask .taskBasic").show();
            $("#newTask .taskList").hide();
        } else if (taskType == "list") {
            $("#newTask .taskList").show();
            $("#newTask .taskBasic").hide();
        } else {
            $("#newTask .taskList").hide();
            $("#newTask .taskBasic").hide();
        }
    });

    /**
     *Toggle task editing view based on option selected at the input
     */
    if ($("#editTask .taskType").val() === "basic") {
        $("#editTask .taskBasic").show();
        $("#editTask .taskList").hide();
    } else if ($("#editTask .taskType").val() === "list") {
        $("#editTask .taskList").show();
        $("#editTask .taskBasic").hide();
    }

    /**
     *Toggle task editing options based on option selected at the input
     */
    $("#editTask .taskType").on("change", function () {
        var taskType = $("#editTask .taskType").val();
        if (taskType == "basic") {
            $("#editTask .taskBasic").toggle();
            $("#editTask .taskList").hide();
        } else if (taskType == "list") {
            $("#editTask .taskList").toggle();
            $("#editTask .taskBasic").hide();
        } else {
            $("#editTask .taskList").hide();
            $("#editTask .taskBasic").hide();
        }
    });

    /**
     *Search functionality for filtering table rows based on input text
     */
    var searchInput = document.getElementById("searchInput");
    var tableBody = document.getElementById("table-body");

    if (searchInput) {
        searchInput.addEventListener("input", function () {
            var searchText = searchInput.value.toLowerCase();
            var tasks = tableBody.getElementsByTagName("tr");

            for (var i = 0; i < tasks.length; i++) {
                var taskName = tasks[i].getElementsByTagName("td")[1];
                if (taskName) {
                    var taskNameText =
                        taskName.textContent || taskName.innerText;
                    if (taskNameText.toLowerCase().indexOf(searchText) > -1) {
                        tasks[i].style.display = "";
                    } else {
                        tasks[i].style.display = "none";
                    }
                }
            }
        });
    }

    /**
     * Add an intel to the list whet the “Add Item” button is clicked
     */
    document.addEventListener("click", function (event) {
        if (event.target && event.target.id === "addItem") {
            const itemInput = document.getElementById("item");
            const itemText = itemInput.value.trim();
            const itemList = document.getElementById("itemList");
            const hiddenItemsInput = document.getElementById("hiddenItems");

            if (itemText !== "") {
                const listItem = document.createElement("li");
                listItem.textContent = itemText;
                itemList.appendChild(listItem);

                const hiddenItemInput = document.createElement("input");
                e;
                hiddenItemInput.name = "items[]";
                hiddenItemInput.value = itemText;
                hiddenItemsInput.appendChild(hiddenItemInput);

                itemInput.value = "";
            }
        }
    });

    /**
     * Add members when “add member” button is clicked
     */
    document.addEventListener("click", function (event) {
        if (event.target && event.target.id === "addMemberBtn") {
            const memberInput = document.getElementById("addMembersInput");
            const memberEmail = memberInput.value.trim();
            const memberList = document.getElementById("memberList");
            const hiddenMembersInput = document.getElementById("hiddenMembers");

            if (memberEmail !== "") {
                if (/^\S+@\S+\.\S+$/.test(memberEmail)) {
                    if (
                        ![...memberList.children].some(
                            (li) => li.textContent === memberEmail
                        )
                    ) {
                        const listItem = document.createElement("li");
                        listItem.textContent = memberEmail;
                        memberList.appendChild(listItem);

                        const hiddenMemberInput =
                            document.createElement("input");
                        hiddenMemberInput.type = "hidden";
                        hiddenMemberInput.name = "members[]";
                        hiddenMemberInput.value = memberEmail;
                        hiddenMembersInput.appendChild(hiddenMemberInput);

                        memberInput.value = "";
                    } else {
                        alert("This user is already on the list.");
                    }
                } else {
                    alert("Please enter a valid email address.");
                }
            }
        }
    });

    document.addEventListener("click", function (event) {
        if (event.target && event.target.id === "addMemberBtn") {
            const memberInput = document.getElementById("addMembersInput");
            const memberEmail = memberInput.value.trim();

            fetch('{{ route("email_exists") }}', {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify({ email: memberEmail }),
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.exists) {
                        const memberList =
                            document.getElementById("memberList");
                        const hiddenMembersInput =
                            document.getElementById("hiddenMembers");

                        const listItem = document.createElement("li");
                        listItem.textContent = memberEmail;
                        memberList.appendChild(listItem);

                        const hiddenMemberInput =
                            document.createElement("input");
                        hiddenMemberInput.type = "hidden";
                        hiddenMemberInput.name = "members[]";
                        hiddenMemberInput.value = memberEmail;
                        hiddenMembersInput.appendChild(hiddenMemberInput);

                        memberInput.value = "";
                    } else {
                        alert("Email does not belong to any user.");
                    }
                })
                .catch((error) => {
                    console.error("Error checking email:", error);
                });
        }
    });

    /**
     * Hide all elements with the class “eyeClosed” and “menuFilters”
     */
    $(".eyeClosed").hide();
    $("#menuFilters").hide();

    /**
     *Toggle visibility of all elements with the class “showDetails”
     */
    $(".showDetails").on("click", function () {
        $(this).find(".eyeOpened").toggle();
        $(this).find(".eyeClosed").toggle();
        $(this).closest("tr").nextUntil("tr:not(.taskDescription)").toggle();
    });

    $("#filterBtn").on("click", function () {
        $("#menuFilters").toggle();
        if ($("#menuFilters").is(":visible")) {
            $("#tasks").css({
                width: "80%",
                "margin-left": "5%",
            });
            $("#spaceMenu").css({
                width: "80%",
                "margin-left": "5%",
            });
        } else {
            $("#tasks").css({
                width: "90%",
                "margin-left": "auto",
            });
            $("#spaceMenu").css({
                width: "90%",
                "margin-left": "auto",
            });
        }
    });

    /**
     * Hide all elements with the class “editMemberRow”
     */

    document.querySelectorAll(".editMemberRow").forEach(function (row) {
        row.style.display = "none";
    });

    /**
     * Toggle visibility of space edit rows
     */
    document.querySelectorAll(".btnEditSpace").forEach(function (btn) {
        btn.addEventListener("click", function () {
            var row = btn.parentElement.parentElement.nextElementSibling;
            if (row) {
                row.style.display =
                    row.style.display === "none" ? "table-row" : "none";
            }
        });
    });

    /**
     * Initialize editing functionality for list items
     */
    const editItemLinks = document.querySelectorAll(".editItem");

    editItemLinks.forEach(function (editItemLink) {
        editItemLink.addEventListener("click", function (event) {
            event.preventDefault();
            const listItem = event.target.closest("li");
            const span = listItem.querySelector("span");
            const itemName = span.textContent;
            const editInput = document.createElement("input");
            editInput.type = "text";
            editInput.value = itemName;
            editInput.classList.add("editInput");

            editInput.addEventListener("keypress", function (e) {
                if (e.key === "Enter") {
                    const newItemName = editInput.value.trim();
                    if (newItemName !== "") {
                        span.textContent = newItemName;
                        listItem.removeChild(editInput);
                        const itemId = listItem
                            .querySelector("input[type=hidden]")
                            .getAttribute("id")
                            .replace("item_", "");
                        document.getElementById("item_" + itemId).value =
                            newItemName;
                    }
                }
            });

            listItem.appendChild(editInput);
            editInput.focus();
        });
    });

    var width767 = false;
    var originalContents = [];

    $(window).resize(function () {
        if ($(window).width() < 767 && !width767) {
            width767 = true;
            $("th:nth-child(3), th:nth-child(4), th:nth-child(5)").hide();
            $("#table-body tr:nth-child(odd)").each(function (i) {
                var endDate = $(this).find("td:nth-child(3)").text();
                var status = $(this).find("td:nth-child(4)").text();
                var assignees = $(this).find("td:nth-child(5)").html();
                var originalContent = $(this)
                    .next(".taskDescription")
                    .find("td:nth-child(2)")
                    .html();

                $(this)
                    .find("td:nth-child(3), td:nth-child(4), td:nth-child(5)")
                    .hide();

                var descriptionContent =
                    originalContent +
                    "<br><h3>End Date:</h3> " +
                    endDate +
                    "<br><h3>Status:</h3> " +
                    status +
                    "<br><h3>Assignees:</h3> " +
                    assignees;

                $(this)
                    .next(".taskDescription")
                    .find("td:nth-child(2)")
                    .html(descriptionContent);
                originalContents[i] = originalContent;
            });
        } else if ($(window).width() >= 767 && width767) {
            width767 = false;
            $("th:nth-child(3), th:nth-child(4), th:nth-child(5)").show();

            $("#table-body tr:nth-child(odd)").each(function (i) {
                $(this)
                    .find("td:nth-child(3), td:nth-child(4), td:nth-child(5)")
                    .show();
                $(this)
                    .next(".taskDescription")
                    .find("td:nth-child(2)")
                    .html(originalContents[i]);
            });
        }
    });

    $(".taskStatus").on("change", function () {
        $(this).closest("form").submit();
    });

    document.getElementById("alertDelete").style.display = "none";

    /**
     *Show  confirmation alert account delete
     */
    document.getElementById("deleteAccount").onclick = function () {
        document.getElementById("alertDelete").style.display = "flex";
    };

    /**
     *Hide confirmation alert account delete
     */
    document.getElementById("cancelDelAccount").onclick = function () {
        document.getElementById("alertDelete").style.display = "none";
    };

    /**
     * Call input when element with id “editPhotoProfile” is clicked
     */
    $("#editPhotoProfile").click(function () {
        var input = document.getElementById("uploadPhotoProfile");
        input.click();
    });
});

/**
 * Validate if email exist and add member if is valid
 */
function checkEmailAndAddMember() {
    const memberInput = document.getElementById("addMembersInput");
    const memberEmail = memberInput.value.trim();

    if (memberEmail === "") {
        alert("Please, enter an email.");
        return;
    }

    if (!/^\S+@\S+\.\S+$/.test(memberEmail)) {
        alert("Please enter a valid email address.");
        return;
    }

    const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
    if (!csrfTokenElement) {
        console.error("CSRF token meta tag not found.");
        return;
    }

    const emailExistsUrl = document
        .querySelector('meta[name="emailExists"]')
        .getAttribute("content");
    const csrfToken = csrfTokenElement.getAttribute("content");

    fetch(emailExistsUrl, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
        body: JSON.stringify({ email: memberEmail }),
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then((data) => {
            if (data.exists) {
                const memberList = document.getElementById("memberList");
                const hiddenMembersInput =
                    document.getElementById("hiddenMembers");

                if (
                    ![...memberList.children].some(
                        (li) => li.textContent === memberEmail
                    )
                ) {
                    const listItem = document.createElement("li");
                    listItem.textContent = memberEmail;
                    memberList.appendChild(listItem);

                    const hiddenMemberInput = document.createElement("input");
                    hiddenMemberInput.type = "hidden";
                    hiddenMemberInput.name = "members[]";
                    hiddenMemberInput.value = memberEmail;
                    hiddenMembersInput.appendChild(hiddenMemberInput);

                    memberInput.value = "";
                } else {
                    alert("This user is already on the list.");
                }
            } else {
                alert("Email does not belong to any user.");
            }
        })
        .catch((error) => {
            console.error("Error checking email:", error);
        });
}

/**
 * Confirm space deletion and redirect if confirmed
 * @param string url to redirect to
 */
function spaceConfirmDelete(url) {
    if (confirm("Are you sure to delete this space?")) {
        window.location.href = url;
    }
}

/**
 * Confirm task deletion and redirect if confirmed
 * @param string url to redirect to
 */
function taskConfirmDelete(url) {
    if (confirm("Are you sure to delete this task?")) {
        window.location.href = url;
    }
}

/**
 * Confirm member deletion and redirect if confirmed
 * @param string url to redirect to
 */
function memberConfirmDelete(url) {
    if (confirm("Are you sure to delete this member?")) {
        window.location.href = url;
    }
}
