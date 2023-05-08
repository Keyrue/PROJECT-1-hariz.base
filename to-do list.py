# define an empty list to store the to-do items
to_do_list = []

# function to add a new item to the to-do list
def add_item():
    item = input("Enter a new item: ")
    to_do_list.append(item)
    print("Item added to the list.")

# function to remove an item from the to-do list
def remove_item():
    item = input("Enter the item to remove: ")
    if item in to_do_list:
        to_do_list.remove(item)
        print("Item removed from the list.")
    else:
        print("Item not found in the list.")

# function to display the to-do list
def display_list():
    print("To-Do List:")
    for item in to_do_list:
        print("- " + item)

# loop to display the menu and get user input
while True:
    print("\nMenu:")
    print("1. Add item")
    print("2. Remove item")
    print("3. Display list")
    print("4. Exit")

    choice = input("Enter your choice (1-4): ")

    if choice == "1":
        add_item()
    elif choice == "2":
        remove_item()
    elif choice == "3":
        display_list()
    elif choice == "4":
        print("Exiting...")
        break
    else:
        print("Invalid choice. Please enter a number between 1 and 4.")
