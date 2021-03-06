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
        const list = document.querySelector('#book-list');
        list.innerHTML = "";
        var xhr = new XMLHttpRequest();
            xhr.open('GET','book-list.php',true);
            xhr.onload = function(){
                if(this.status==200){
                    const StoreBooks = JSON.parse(this.responseText);
                    const books = StoreBooks;
                    books.forEach(function(book){
                        UI.addBookToList(book);
                    });
                }
            }
            xhr.send();
        }

    static addBookToList(book){
        const list = document.querySelector('#book-list');
        const row = document.createElement('tr');
        row.innerHTML = `
        <td>${book.title}</td>
        <td>${book.author}</td>
        <td>${book.isbn}</td>
        <td><a data-id="${book.id}" class="btn btn-danger btn-sm delete">X</a></td>
        ` ;
        list.appendChild(row);
    }

    static deleteBook(el){
        if(el.classList.contains('delete')){
            el.parentElement.parentElement.remove();
            var bookId = el.getAttribute("data-id");
            BookStorage.delete(bookId);
        }
    }

    static clearFields(){
        document.querySelector('#title').value = '';
        document.querySelector('#author').value = '';
        document.querySelector('#isbn').value = '';
    }

    
}

//Store Class : Handles Storage
class BookStorage{
    static storeBooks(book){
        //Store date to database using a post HTTP request to php file
        var params = "title=" + book.title +
                    "&author=" + book.author + 
                    "&isbn=" + book.isbn;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'process.php', true);
        xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
        xhr.onload = function(){
            if(this.status == 200){
                console.log(this.responseText);
                UI.displayBooks(book);
            }
        }

        xhr.send(params);
    }

    static delete(bookId){
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'delete.php?id='+bookId, true);
        xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
        xhr.onload = function(){
            if(this.status == 200){
                console.log(this.responseText);
            }
        }

        xhr.send();
    }
}

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
//UI.addBookToList(book);
//UI.clearFields();
BookStorage.storeBooks(book);
});

//Event : Remove  a book
document.querySelector('#book-list').addEventListener('click',function(e){
UI.deleteBook(e.target);
});