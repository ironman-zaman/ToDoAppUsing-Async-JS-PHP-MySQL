//Book Class:Represent a book
class Book{
    constructor(title,author,isbn){
        this.title = title;
        this.author = author;
        this.isbn = isbn;
    }
}
//UI Class: Handle UI Tasks
class UI{
    static displayBooks(){
        const StoreBooks = [
            {
                title : 'Book One',
                author : 'Arbin',
                isbn : '3434343'
            },
            {
                title : 'Book Tow',
                author : 'Aktar',
                isbn : '5434343'
            }
        ];

        const books = StoreBooks;
        books.forEach(function(book){
            UI.addBookToList(book);
        });
    }

    static addBookToList(book){
        const list = document.querySelector('#book-list');
        const row = document.createElement('tr');
        row.innerHTML = `
        <td>${book.title}</td>
        <td>${book.author}</td>
        <td>${book.isbn}</td>
        <td><a  class="btn btn-danger btn-sm delete">X</a></td>
        ` ;
        list.appendChild(row);
    }

    static deleteBook(el){
        console.log('clicked');
        if(el.classList.contains('delete')){
            el.parentElement.parentElement.remove();
        }
    }

    static clearFields(){
        document.querySelector('#title').value = '';
        document.querySelector('#author').value = '';
        document.querySelector('#isbn').value = '';
    }

    
}

//Store Class : Handles Storage

//Event : Display a book
document.addEventListener('DOMContentLoaded', UI.displayBooks);

//Event : Add a book
document.querySelector('#book-form').addEventListener('submit', function(e){
//Prevent default action of submit
e.preventDefault();
//Get form values
const title = document.querySelector('#title').value;
const author = document.querySelector('#author').value;
const isbn = document.querySelector('#isbn').value;

//Instantiate book
const book = new Book(title,author,isbn);
//Add book to UI
UI.addBookToList(book);
UI.clearFields();
});

//Event : Remove  a book
document.querySelector('#book-list').addEventListener('click',function(e){
UI.deleteBook(e.target);
});