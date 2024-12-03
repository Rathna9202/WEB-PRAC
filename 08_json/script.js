// script.js
document.addEventListener('DOMContentLoaded', () => {
    const postsContainer = document.getElementById('posts');
  
    // Fetch posts from JSONPlaceholder
    fetch('https://jsonplaceholder.typicode.com/posts')
      .then(response => response.json())
      .then(posts => {
        posts.forEach(post => {
          // Create a card for each post
          const card = document.createElement('div');
          card.classList.add('card');
          
          // Title
          const title = document.createElement('h2');
          title.innerText = post.title;
          card.appendChild(title);
          
          // Body
          const body = document.createElement('p');
          body.innerText = post.body;
          card.appendChild(body);
  
          // Add the card to the container
          postsContainer.appendChild(card);
        });
      })
      .catch(error => console.error('Error fetching posts:', error));
  });
  