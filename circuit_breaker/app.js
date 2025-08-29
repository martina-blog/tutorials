'use strict';

const Fastify = require('fastify');
const axios = require('axios');
const CircuitBreaker = require('./circuitBreaker');

const app = Fastify({ logger: true });

// Create a breaker for our external API
const apiBreaker = new CircuitBreaker({
	failureThreshold: 3,
	cooldownPeriod: 5000,
	successThreshold: 2,
});

app.get('/joke', async (req, reply) => {
	try {
		const result = await apiBreaker.call(async () => {
			// Example flaky API
			const { data } = await axios.get('https://official-joke-api.appspot.com/random_joke');
			return data;
		});

		return { success: true, joke: result };
	} catch (err) {
		app.log.error(err.message);
		return { success: false, message: "Service is temporarily unavailable. Try again later." };
	}
});

app.listen({ port: 3000 });