document.getElementById('generateQuestionsBtn').addEventListener('click', () => {
    const syllabus = document.getElementById('syllabus').value;
    const questionType = document.getElementById('questionType').value;
    const numQuestions = document.getElementById('numQuestions').value;
  
    // Check if syllabus input is empty
    if (!syllabus) {
      alert('Please enter syllabus details.');
      return;
    }
  
    // Send data to PHP backend
    fetch('generate_questions.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        syllabus,
        questionType,
        numQuestions,
      }),
    })
      .then(response => response.json())
      .then(data => {
        // Display generated questions
        const questionsContainer = document.getElementById('questionsContainer');
        questionsContainer.innerHTML = '<h3>Generated Questions:</h3>';
        data.questions.forEach((question, index) => {
          questionsContainer.innerHTML += `<p>${index + 1}. ${question}</p>`;
        });
      })
      .catch(error => console.error('Error:', error));
  });
  