export default [
    {
        question: 'Are you sensitive to cold or heat?',
        answers: [
            "Normal ",
            "Sensitive to cold ",
            "Sensitive to heat"
        ]
    },
    {
        question: "What is Keto diet?",
        answers: [
            "The ketogenic diet is a very low-carb, high-fat diet. To achieve positive results, this diet has to be very low in carbohydrates, high in dietary fat and include a moderate amount of proteins. This reduction in carbs puts your body into a metabolic state called ketosis. When this happens, your body becomes incredibly efficient at burning fat for energy. Ketogenic diet can cause massive reductions in blood sugar, insulin levels and help with weight loss.",
            {
                subtitle: "Benefits of keto diet:",
                descriptions: [
                    "Weight loss",
                    "Reduced blood pressure",
                    "Slower ageing process",
                    "Improved sleep and mood",
                    "Increased energy efficiency"
                ]
            }
        ],
        next_button: 'Got it'
    },
    {
        question: "How much time do you have for meal preparation each day?",
        answers: [
            "Up to 30 minutes",
            "Up to 1 hour",
            "more that 1 hour`"
        ]
    },
    {
        question: "Meat",
        sub_question: "Please select which products you would like included in the plan?",
        answers: [
            "Chicken",
            "Pork",
            "Beef",
            "Fish",
            "Lamb",
            "Veal",
            "I am vegeterian"
        ]
    },
    {
        question: "Products",
        sub_question: "Please select which products you would like included in the plan?",
        answers: [
            "Onions",
            "Mushrooms",
            "Eggs",
            "Nuts",
            "Cheese",
            "Butter",
            "Milk",
            "Avocados",
            "Seafood",
            "Olives",
            "Capers",
            "Coconut",
            "Goat cheese"
        ],
        multi_selects: 4
    },
    {
        question: "How physically active are you?",
        answers: [
            "Workout hero (3-5 workouts / week)",
            "Light-mode (1-2 workouts / week)",
            "A newbie (Just starting)"
        ]
    },
    {
        question: "How willing are you to lose weight?",
        answers: [
            "I just want to try the Keto diet",
            "I want to try it and lose some weight",
            "I want to lose the maximum amount of weight"
        ]
    },
    {
        question: "Measurements?",
        answers: [
            "Age",
            "Height",
            "Weight",
            "Target Weight"
        ]
    }
]