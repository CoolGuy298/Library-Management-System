select * from publisher;

select b.title, a.name
from book b
join book_author ba on b.book_id = ba.book_id
join author a on a.author_id = ba.author_id;

select b.title, g.name
from book b
join book_genre bg on b.book_id = bg.book_id
join genre g on g.genre_id = bg.genre_id;