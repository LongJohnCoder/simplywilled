import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PlanForMedicalEmergencyComponent } from './plan-for-medical-emergency.component';

describe('PlanForMedicalEmergencyComponent', () => {
  let component: PlanForMedicalEmergencyComponent;
  let fixture: ComponentFixture<PlanForMedicalEmergencyComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PlanForMedicalEmergencyComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PlanForMedicalEmergencyComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
