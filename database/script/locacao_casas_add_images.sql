ALTER TABLE bens_locaveis
ADD COLUMN imagem VARCHAR(255) AFTER observacao;

UPDATE bens_locaveis
SET imagem = 'images/find/Bunga14.jpg'
WHERE id = 1;

UPDATE bens_locaveis
SET imagem = 'images/find/Bunga13.jpg'
WHERE id = 2;

UPDATE bens_locaveis
SET imagem = 'images/find/Bunga7.jpg'
WHERE id = 3;

UPDATE bens_locaveis
SET imagem = 'images/find/Bunga16.jpg'
WHERE id = 4;

UPDATE bens_locaveis
SET imagem = 'images/find/Bunga3.jpg'
WHERE id = 5;

UPDATE bens_locaveis
SET imagem = 'images/find/Bunga6.jpg'
WHERE id = 6;

UPDATE bens_locaveis
SET imagem = 'images/find/Bunga9.jpg'
WHERE id = 7;

UPDATE bens_locaveis
SET imagem = 'images/find/Bunga5.jpg'
WHERE id = 8;

UPDATE bens_locaveis
SET imagem = 'images/find/Bunga10.jpg'
WHERE id = 9;

UPDATE bens_locaveis
SET imagem = 'images/find/Bunga12.jpg'
WHERE id = 10;

UPDATE bens_locaveis
SET imagem = 'images/find/Bunga8.jpg'
WHERE id = 11;

UPDATE bens_locaveis
SET imagem = 'images/find/Bunga15.jpg'
WHERE id = 12;

UPDATE bens_locaveis
SET imagem = 'images/find/Bunga11.jpg'
WHERE id = 13;

UPDATE bens_locaveis
SET imagem = 'images/find/Bunga4.jpg'
WHERE id = 14;

UPDATE bens_locaveis
SET imagem = 'images/find/Bunga1.jpg'
WHERE id = 15;

UPDATE bens_locaveis
SET imagem = 'images/find/Bunga2.jpg'
WHERE id = 16;
