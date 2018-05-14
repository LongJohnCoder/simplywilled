import { TestBed, inject } from '@angular/core/testing';

import { PersonalRepresentativePowerService } from './personal-representative-power.service';

describe('PersonalRepresentativePowerService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [PersonalRepresentativePowerService]
    });
  });

  it('should be created', inject([PersonalRepresentativePowerService], (service: PersonalRepresentativePowerService) => {
    expect(service).toBeTruthy();
  }));
});
