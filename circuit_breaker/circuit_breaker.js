// circuitBreaker.js
class CircuitBreaker {
	constructor({ failureThreshold = 3, cooldownPeriod = 10000, successThreshold = 2 }) {
		this.failureThreshold = failureThreshold; // how many failures before "open"
		this.cooldownPeriod = cooldownPeriod;     // how long to wait before "half-open"
		this.successThreshold = successThreshold; // how many successes before "close"

		this.state = "CLOSED"; // CLOSED -> OPEN -> HALF-OPEN
		this.failures = 0;
		this.successes = 0;
		this.nextTry = Date.now();
	}

	async call(action) {
		if (this.state === "OPEN") {
			if (Date.now() > this.nextTry) {
				this.state = "HALF-OPEN"; // let a request through
			} else {
				throw new Error("Circuit breaker is OPEN");
			}
		}

		try {
			const result = await action();

			if (this.state === "HALF-OPEN") {
				this.successes++;
				if (this.successes >= this.successThreshold) {
					this.state = "CLOSED";
					this.failures = 0;
					this.successes = 0;
				}
			}

			return result;
		} catch (err) {
			this.failures++;

			if (this.failures >= this.failureThreshold) {
				this.state = "OPEN";
				this.nextTry = Date.now() + this.cooldownPeriod;
			}

			throw err;
		}
	}
}

module.exports = CircuitBreaker;