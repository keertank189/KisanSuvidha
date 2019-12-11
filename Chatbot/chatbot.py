from chatterbot import ChatBot
from chatterbot.trainers import ListTrainer


# Create a new instance of a ChatBot
bot = ChatBot(
    'Example Bot',
    storage_adapter='chatterbot.storage.SQLStorageAdapter',
    logic_adapters=[
        {
            'import_path': 'chatterbot.logic.BestMatch'
        },
        {
            'import_path': 'chatterbot.logic.SpecificResponseAdapter',
            'input_text': 'Help me!',
            'output_text': 'Ok, here is a link: http://chatterbot.rtfd.org'
        }
    ]
)

trainer = ListTrainer(bot)

# Train the chat bot with a few responses
trainer.train([
    'Can I rent more than one equipment from the same vendor?',
    'Yes.'
])

trainer.train([
	'What are the different payment methods?',
	'Please refer to our payment page for more information.'
])

trainer.train([
	'Why is it necessary to provide my location?',
	'Providing the location allows us to connect you to the closest vendor providing equipments. This in turn fastens the rate at which the equipment is given.'
])

trainer.train([
	'What are the features of this app?',
	'Please refer to the home page for more information.'
])

trainer.train([
	'How do I borrow equipment?',
	'Request the vendor for the equipment after initiating contact. Refer to the renting page for more information.'
])

trainer.train([
	'What schemes can help me out with my current position?',
	'You can choose a scheme of your comfort from the education tab. Please refer to the education page for more information.'
])

trainer.train([
	'How can I talk to a vendor who speaks in a different language?',
	'The language tab can be used by both sides for effective communication in the language that they are accustomed to.Please refer the language page for more information.'
])

trainer.train([
	'Do I need to provide my ID proof everytime I rent?',
	'Yes.'
])

trainer.train([
	'My crops have not given me any profit this year. This has been happening for close to 3 years now.How do I solve this?',
	'Our recommendation system will analyze the soil of your area and provide the crop which can generate the maximum profit.Please refer our recommendation page for more information.'
])

trainer.train([
	'Should I grow rice or wheat?',
	'Depending on the soil that is present there and how much can be produced to maximise profits, the recommendation system can come in handy for that moment.Please refer our recommendation page for more information.'
])

# Get a response for some unexpected input
response = bot.get_response('Should I grow rice or wheat?')
print(response)




