// Get the stepper elements
const steps = document.querySelectorAll('.step');
const stepperContainer = document.querySelector('.stepper-container');
const stepPanels = document.querySelectorAll('.step-panel');
const nextInfoButton = document.querySelector('.next-info');
const nextQuestionButton = document.querySelector('.next-question');
const restartButton = document.querySelector('.restart');

// Information data array
const informationData = [
    { title: 'Introduction to PHP', content: 'PHP is a popular server-side scripting language for web development. It is embedded within HTML to create dynamic content.' },
    { title: 'PHP History', content: 'PHP was created by Rasmus Lerdorf in 1994 and released in 1995. Originally, PHP stood for "Personal Home Page," but it now stands for "PHP: Hypertext Preprocessor."' },
    { title: 'PHP Usage', content: 'PHP is used to create dynamic web pages, interact with databases, handle form submissions, and perform various server-side tasks. It is widely used in web development alongside HTML, CSS, and JavaScript.' },
    { title: 'Basic Syntax', content: 'PHP code is embedded within HTML using `<?php ... ?>` tags. Variables are denoted with a dollar sign (`$`), and comments can be single-line (`//`, `#`) or multi-line (`/* ... */`).' },
    { title: 'Data Types', content: 'PHP supports several data types including integers, floating-point numbers, strings, arrays, and objects. PHP is loosely typed, meaning variables do not need explicit type declarations.' },
    { title: 'Common Functions', content: 'Common PHP functions include `strlen()` for string length, `array_merge()` for merging arrays, `fopen()` for opening files, and `$_POST` for retrieving POST data from forms.' },
    { title: 'PHP Versions', content: 'PHP 5 introduced exception handling and advanced OOP. PHP 7 brought significant performance improvements and new features like scalar type declarations. PHP 8 added JIT compilation and other enhancements.' },
    { title: 'Frameworks', content: 'Popular PHP frameworks include Laravel, Symfony, and CodeIgniter. These frameworks provide tools and libraries to simplify and accelerate development, promote best practices, and facilitate code reuse.' },
    { title: 'Error Handling', content: 'PHP has built-in error reporting and logging capabilities. Functions like `error_reporting()` and `set_error_handler()` are used to manage errors and exceptions in PHP applications.' },
    { title: 'Sessions and Cookies', content: 'PHP supports session management and cookies. Sessions are used to store user data across multiple pages, while cookies are small pieces of data stored on the client’s browser.' },
];

// Quiz data array
const quizData = [
    { question: 'What does PHP stand for?', options: ['Hypertext Preprocessor', 'Pretext Hypertext Processor', 'Preprocessor Home Page'], correctAnswer: 0 },
    { question: 'Les fichiers PHP ont l’extension …. ?', options: ['html', 'xml', 'php'], correctAnswer: 2 },
    { question: 'What will `var_dump()` display when used on an integer variable in PHP?', options: ['The type and value of the variable', 'Only the value of the variable', 'Only the type of the variable', 'An error message'], correctAnswer: 0 },
    { question: 'Which of the following must be installed on your computer to run PHP scripts?', options: ['Adobe Dreamweaver', 'PHP', 'Adico', 'ILs'], correctAnswer: 1 },
    { question: 'Which version of PHP introduced Try/catch Exception?', options: ['PHP 7.2', 'PHP 5.3', 'PHP 5', 'PHP 4'], correctAnswer: 1 },
    { question: 'We can use ___ to comment out a single line?', options: ['/?', '//', '#', '/* */'], correctAnswer: 1 },
    { question: 'Which of the following PHP instructions will store 55 in the variable nbr?', options: ['int $nbr= 55;', 'int nbr = 55;', '$nbr= 55;', '55= $nbr;'], correctAnswer: 2 },
    { question: 'Which function is used to include the content of one PHP file into another PHP file?', options: ['include()', 'insert()', 'require_once()', 'require()'], correctAnswer: 0 },
    { question: 'Which of the following is the correct way to create a function in PHP?', options: ['function myFunction {}', 'function myFunction() {}', 'function:myFunction() {}', 'function = myFunction() {}'], correctAnswer: 1 },
    { question: 'How do you retrieve data from a form that uses the POST method?', options: ['$_POST["name"]', '$_GET["name"]', '$_FORM["name"]', '$_REQUEST["name"]'], correctAnswer: 0 },
    { question: 'Which of the following is not a valid variable name in PHP?', options: ['$my_Var', '$_myVar', '$myVar1', '$1myVar'], correctAnswer: 3 },
    { question: 'Which operator is used to concatenate two strings in PHP?', options: ['+', '&', '.', '#'], correctAnswer: 2 },
    { question: 'What will the count() function return when used on an array in PHP?', options: ['The number of elements in the array', 'The sum of the elements in the array', 'The size of the array in bytes', 'The average of the elements in the array'], correctAnswer: 0 },
    { question: 'Which of the following is used to start a session in PHP?', options: ['session_start();', 'session();', 'session_init();', 'session_begin();'], correctAnswer: 0 },
    // Add more quiz data here
];

let currentStep = 1;
let currentInfoIndex = 0;
let currentQuizIndex = 0;
let score = 0;
let timer;
const quizDuration = 30 * 1000; // 30 seconds for each question

// Function to update the stepper UI based on the current step
function updateStepper() {
    steps.forEach((step, index) => {
        step.classList.toggle('active', index + 1 === currentStep);
    });

    stepPanels.forEach((panel, index) => {
        panel.classList.toggle('active', index + 1 === currentStep);
    });

    if (currentStep === 1) {
        showInformation();
    } else if (currentStep === 2) {
        startQuiz();
    } else if (currentStep === 3) {
        showResults();
    }
}

// Function to go to the next step
function nextStep() {
    if (currentStep < steps.length) {
        currentStep++;
        updateStepper();
    }
}

// Function to navigate directly to a specific step
function goToStep(stepNumber) {
    if (stepNumber >= 1 && stepNumber <= steps.length) {
        currentStep = stepNumber;
        updateStepper();
    }
}

// Add event listeners to the steps for direct navigation
steps.forEach((step, index) => {
    step.addEventListener('click', () => goToStep(index + 1));
});

// Information display functions
function showInformation() {
    const informationContent = document.getElementById('informationContent');
    const info = informationData[currentInfoIndex];
    informationContent.innerHTML = `<h3>${info.title}</h3><p>${info.content}</p>`;

    // Handle "Next" button visibility
    nextInfoButton.style.display = (currentInfoIndex < informationData.length - 1) ? 'inline-block' : 'none';
}

// Event listener for the Next button in the information step
nextInfoButton.addEventListener('click', () => {
    currentInfoIndex++;
    if (currentInfoIndex >= informationData.length) {
        currentInfoIndex = 0;
        nextStep(); // Move to the next step (Quiz)
    }
    showInformation();
});

// Quiz handling functions
function startQuiz() {
    showQuestion();
}

function showQuestion() {
    const questionContent = document.getElementById('questionContent');
    const quiz = quizData[currentQuizIndex];
    questionContent.innerHTML = `
        <h3>${quiz.question}</h3>
        <ul>
            ${quiz.options.map((option, index) => `<li><input type="radio" name="option" data-index="${index}">${option}</li>`).join('')}
        </ul>
    `;

    const optionElements = questionContent.querySelectorAll('input[name="option"]');
    optionElements.forEach(option => {
        option.addEventListener('click', () => handleAnswer(parseInt(option.getAttribute('data-index'))));
    });

    startTimer();
}

function startTimer() {
    const timerElement = document.getElementById('timer');
    let timeLeft = quizDuration;

    function updateTimer() {
        timeLeft -= 1000;
        const seconds = Math.floor(timeLeft / 1000);
        timerElement.textContent = `Time left: 00:${seconds < 10 ? '0' + seconds : seconds}`;

        if (timeLeft <= 0) {
            clearInterval(timer);
            handleAnswer(-1); // Timeout, consider it wrong
        }
    }

    timer = setInterval(updateTimer, 1000);
}

// Function to show the Submit button and handle the submission
function showSubmitButton() {
  const questionContent = document.getElementById('questionContent');
  questionContent.innerHTML = ''; // Clear current content

  const submitButton = document.createElement('button');
  submitButton.textContent = 'Submit';
  submitButton.classList.add('btn', 'btn-primary');
  
  // Add click event listener for the submit button
  submitButton.addEventListener('click', () => {
      alert('Saving your answers...'); // Alert before saving
      submitScore(score); // Call the function to save the test result
      currentStep++; // Move to the results step
      updateStepper(); // Update stepper to reflect new step
  });
  
  // Append the button to the question content
  questionContent.appendChild(submitButton);
}

// Function to handle answer selection
function handleAnswer(selectedIndex) {
  clearInterval(timer); // Stop the timer

  const correctAnswer = quizData[currentQuizIndex].correctAnswer;
  if (selectedIndex === correctAnswer) {
      score++; // Increment score for correct answer
  }

  currentQuizIndex++;
  if (currentQuizIndex < quizData.length) {
      showQuestion(); // Show the next question
  } else {
      showSubmitButton(); // Show the Submit button
  }
}


function showResults() {
    const resultsElement = document.getElementById('results');
    resultsElement.innerHTML = quizData.map((quiz, index) => `
        <div class="result-item">
            <p><strong>Question ${index + 1}:</strong> ${quiz.question}</p>
            <p><strong>Correct Answer:</strong> ${quiz.options[quiz.correctAnswer]}</p>
        </div>
    `).join('');
    resultsElement.innerHTML += `<p>Your score is ${score} out of ${quizData.length}.</p>`;
}

// Restart the quiz
restartButton.addEventListener('click', () => {
    currentInfoIndex = 0;
    currentQuizIndex = 0;
    score = 0;
    goToStep(1); // Restart from the information step
});

// Function to save the test result
function submitScore(score) {
    if (typeof score !== 'number' || isNaN(score)) {
        alert('Invalid score');
        return;
    }

    // Send the score to the server
    fetch('save_test.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ score: score })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert('Score saved successfully!');
        } else {
            alert('Failed to save score: ' + data.message);
        }
    })
    .catch(error => {
        alert('Error saving score: ' + error);
    });
}

// Initialize the stepper
updateStepper();
/************************* */
